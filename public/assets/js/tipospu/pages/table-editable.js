 jQuery(document).ready(function()
    {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
            // jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[1].innerHTML = '<select id="master" name="master"><option value="Πρωτεύον">Πρωτεύον</option><option value="Δευτερεύον">Δευτερεύον</option></select>';
            aData[1] = document.getElementById('master');
            // aData[2] = $('input[name="_token"]').val();
            jqTds[2].innerHTML = '<a class="edit" href="">Αποθήκευση</a>';
            jqTds[3].innerHTML = '<a class="cancel" href="">Ακύρωση</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var jqSelects = $('select', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqSelects[0].value, nRow, 1, false);
            oTable.fnUpdate('<a class="edit" href="">Επεξεργασία</a>', nRow, 2, false);
            oTable.fnUpdate('<a class="delete" href="">Ακύρωση</a>', nRow, 3, false);
            oTable.fnDraw();
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var jqSelects = $('select', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqSelects[0].value, nRow, 1, false);
            oTable.fnUpdate('<a class="edit" href="">Επεξεργασία</a>', nRow, 4, false);
            oTable.fnDraw();
        }

        var table = $('#sample_editable_1');

        var oTable = table.dataTable({
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
            "select":true,
            "responsive":true,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_1_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: false //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Η επιλογή δεν αποθηκεύτηκε. Θέλετε να αποθηκευτεί;")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Είσαστε σίγουροι πως θέλετε να διαγραφεί η εγγραφή;") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];


            var aData = oTable.fnGetData(nRow);
            var dataString = 'suburl=' + aData[0] + '&master=' + aData[1];
            alert (dataString);
            var pathArray = window.location.pathname.split( '/' );
            var sid = pathArray[3];
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '../../suburls/delete',
                        data: {_token: $('[name="csrf_token"]').attr('content'), sid: sid, suburl: aData[0], master: aData[1]},
                        dataType: 'JSON',
                        success: function(response){
                        }  
                    });
            oTable.fnDeleteRow(nRow);

            alert("Η διαγραφή έγινε επιτυχώς!");
            

        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();

            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Αποθήκευση") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;
                // alert("Συγχαρητηρια! Η καταχώρηση έγινε επιτυχώς.");
                var aData = oTable.fnGetData(nRow);
                    var dataString = 'suburl=' + aData[0] + '&master=' + aData[1] + '&row=' + nRow;
                    alert (dataString);
                    var pathArray = window.location.pathname.split( '/' );
                    var sid = pathArray[3];

                    var master = "";
                    switch(aData[1]) {
                        case "Πρωτεύον":
                            master = 1;
                            break;
                        case "Δευτερεύον":
                            master = 0;
                            break;
                        default:
                            master = 1;
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '../../suburls/save',
                        data: {_token: $('[name="csrf_token"]').attr('content'), sid: sid, suburl: aData[0], master: master},
                        dataType: 'JSON',
                        success: function(response){
                            alert("Συγχαρητηρια! Η καταχώρηση έγινε επιτυχώς.");
                            alert('It Works!!!');
                        }
                        
                    });

                    alert("Συγχαρητηρια! Η καταχώρηση έγινε επιτυχώς.");

                    return false;
 
 
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    });