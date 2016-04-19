 jQuery(document).ready(function() {

    // process the form
    // $('form').submit(function(event) {
        
    // $('input[id="my_checkbox"]').on('switchChange.bootstrapSwitch', function(event) {    
    $('.make-switch').on('switchChange.bootstrapSwitch', function (e, data) {
        var id = $(this).attr('data-id');
        var umessage_type = $(this).attr('data-umsg_type');

        switch(umessage_type){
                        case "danger":
                            var umessage_type_text = "Σημαντική Ειδοποίηση";
                            var umessages_type_text = "Σημαντικές Ειδοποιήσεις";
                        break;
                        case "warning":
                            var umessage_type_text = "Προειδοποίηση";
                            var umessages_type_text = "Προειδοποιήσεις";
                        break;
                        case "success":
                            var umessage_type_text = "Ενημέρωση";
                            var umessages_type_text = "Ενημερώσεις";
                        break;
                        case "info":
                            var umessage_type_text = "Ειδοποίηση";
                            var umessages_type_text = "Ειδοποιήσεις";
                        break;
                    }

        // var status = data.value; // TRUE OR FALSE
        // alert(id);
        // alert(status);
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)

        var formData = {
            // 'umessage_id'              : $('input[name=umessage_id]').val()
            // 'umessage_id'              : $('input[id=umessage_id_1]').val()
            'umessage_id'              : document.getElementById("umessage_id_" + id).value,
            'umessage_state'              : document.getElementById("umessage_state_" + id).value,
        };

        // document.getElementById("myRadio").checked;

        $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '../../admin/umessages/edit', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'JSON', // what type of data do we expect back from the server
            encode      : true,
            success: function (data) {
                // document.getElementById("umessage_button").className += " disabled";
                

                if(document.getElementById("my_checkbox_" + id).checked==true) 
                //checks status of "from" element. change to whatever validation you prefer.
                    {
                        document.getElementById("umessage_notification").innerHTML = parseInt(document.getElementById("umessage_notification").innerHTML) - 1;

                        document.getElementById("umessage_" + umessage_type + "_notification").innerHTML = parseInt(document.getElementById("umessage_" + umessage_type + "_notification").innerHTML) - 1;

                        if (parseInt(document.getElementById("umessage_notification").innerHTML) < 0){
                            document.getElementById("umessage_notification").innerHTML = 0;    
                        }
                        document.getElementById("my_checkbox_" + id).checked=true;
                         //if validation returns true, checks target checkbox
                        document.getElementById("umessage_text_" + id).className += " text-muted";
                        document.getElementById("umessage_state_" + id).value = "readen";
                    }
                else
                    {

                        if (!document.getElementById("umessages_" + umessage_type + "_list")){
                            
                            var ul = document.getElementById("umessage_list");
                            var li = document.createElement("li");
                            li.setAttribute("id", "umessages_" + umessage_type + "_list")

                            var icon = document.createElement("i");
                            icon.setAttribute("class", "livicon " + umessage_type);
                            icon.setAttribute("id", "livicon-2");
                            icon.setAttribute("data-n", "info");
                            icon.setAttribute("data-s", "20");
                            icon.setAttribute("data-c", "white");
                            icon.setAttribute("data-hc", "white");
                            icon.setAttribute("style", "width: 20px; height: 20px;");

                            var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                            svg.setAttribute('id', 'canvas-for-livicon-2');
                            svg.setAttribute('style', 'overflow: hidden; position: relative;');
                            svg.setAttribute('version', '1.1');
                            svg.setAttribute('width', '20');
                            svg.setAttribute('height', '20');
                            svg.setAttributeNS("http://www.w3.org/2000/xmlns/", "xmlns", "http://www.w3.org/2000/svg");
                            

                            var desc = document.createElement("desc");
                            // desc.createTextNode("Created with Raphaël 2.1.0");
                            var defs = document.createElement("defs");
                            var path = document.createElement("path");
                            path.setAttribute('transform', 'matrix(0.625,0,0,0.625,0,0)');
                            path.setAttribute('stroke-width', '0');
                            path.setAttribute('d', 'M16,3C8.82,3,3,8.82,3,16S8.82,29,16,29C23.179000000000002,29,29,23.18,29,16S23.179,3,16,3ZM15.899,7.7C17.06,7.7,18,8.639,18,9.8C18,10.958,17.06,11.9,15.899000000000001,11.9S13.799000000000001,10.959,13.799000000000001,9.8C13.8,8.639,14.739,7.7,15.899,7.7ZM18.698,24.5H16.198C15.198,24.5,14.198,23.5,14.198,22.5V15.7C14.198,15.2,12.598,14.7,12.598,14.2C12.598,13.799999999999999,13.198,13.5,13.697000000000001,13.5H16.198C17.198,13.5,18.198,14.2,18.198,15.2V22.5C18.198,23,19.8,23.4,19.8,23.9C19.8,24.301,19.2,24.5,18.698,24.5Z');
                            path.setAttribute('stroke', 'none');
                            path.setAttribute('fill', '#ffffff');
                            path.setAttribute('style', '');

                            svg.appendChild(desc);
                            svg.appendChild(defs);
                            svg.appendChild(path);
                            icon.appendChild(svg);
                                                

                            var text_styled = document.createElement("h5");
                            var span_area_notification = document.createElement("span");
                            span_area_notification.setAttribute("id", "umessage_" + umessage_type + "_notification");
                            span_area_notification.appendChild(document.createTextNode('0'));
                            var span_area_msg = document.createElement("span");
                            span_area_msg.setAttribute("id", "umessage_" + umessage_type + "_msg");
                            span_area_msg.appendChild(document.createTextNode(''));
                            
                            // icon.appendChild(document.createTextNode('The man who mistook his wife for a hat'));
                            li.appendChild(icon);

                            text_styled.appendChild(span_area_notification);
                            text_styled.appendChild(span_area_msg);
                            li.appendChild(text_styled);
                            // li.appendChild(document.createTextNode('<h5><span id="umessage_' + umessage_type + '_notification"></span><span id="umessage_' + umessage_type + '_msg">&nbsp; ' + umessage_type_text + '</span></h5>'));
                            // li.appendChild(document.createTextNode('<li id="umessages_' + umessage_type + '_list"><i class="livicon ' + umessage_type + '" data-n="info" data-s="20" data-c="white" data-hc="white"></i><h5><span id="umessage_' + umessage_type + '_notification"></span><span id="umessage_' + umessage_type + '_msg">&nbsp; ' + umessage_type_text + '</span></h5></li>'));

                            ul.appendChild(li);

                            

                        }

                        document.getElementById("umessage_notification").innerHTML = parseInt(document.getElementById("umessage_notification").innerHTML) + 1;
                        document.getElementById("umessage_" + umessage_type + "_notification").innerHTML = parseInt(document.getElementById("umessage_" + umessage_type + "_notification").innerHTML) + 1;
                        if (parseInt(document.getElementById("umessage_notification").innerHTML) < 0){
                            document.getElementById("umessage_notification").innerHTML = 0;    
                        }   
                        document.getElementById("my_checkbox_" + id).checked=false; 
                         //if validation returns true, unchecks target checkbox
                        document.getElementById("umessage_text_" + id).className = "";
                        document.getElementById("umessage_state_" + id).value = "unread";
                    }

                    if (parseInt(document.getElementById("umessage_" + umessage_type + "_notification").innerHTML) < 0){
                        document.getElementById("umessage_" + umessage_type + "_notification").innerHTML = 0;    
                    }

                    // switch (umessage_type) {
                    //         case "danger":                                
                    //             switch (parseInt(document.getElementById("umessage_success_notification").innerHTML)) {
                    //                 case 0:
                    //                     document.getElementById("umessages_success_list").style.display = "none";
                    //                     break;
                    //                 case 1:
                    //                     document.getElementById("umessages_success_list").style.display = "";
                    //                     break;
                    //                 default:
                    //                     document.getElementById("umessages_success_list").style.display = "";
                    //                     break;
                    //             }
                    //             break;
                    //         case "warning":
                    //             switch (parseInt(document.getElementById("umessage_success_notification").innerHTML)) {
                    //                 case 0:
                    //                     document.getElementById("umessages_success_list").style.display = "none";
                    //                     break;
                    //                 case 1:
                    //                     document.getElementById("umessages_success_list").style.display = "";
                    //                     break;
                    //                 default:
                    //                     document.getElementById("umessages_success_list").style.display = "";
                    //                     break;
                    //             }
                    //             break;
                    //         case "success":
                    //             switch (parseInt(document.getElementById("umessage_success_notification").innerHTML)) {
                    //                 case 0:
                    //                     document.getElementById("umessages_success_list").style.display = "none";
                    //                     break;
                    //                 case 1:
                    //                     document.getElementById("umessages_success_list").style.display = "";
                    //                     break;
                    //                 default:
                    //                     document.getElementById("umessages_success_list").style.display = "";
                    //                     break;
                    //             }
                    //             break;
                    //         case "info":
                    //             switch (parseInt(document.getElementById("umessage_success_notification").innerHTML)) {
                    //                 case 0:
                    //                     document.getElementById("umessages_success_list").style.display = "none";
                    //                     break;
                    //                 case 1:
                    //                     document.getElementById("umessages_success_list").style.display = "";
                    //                     break;
                    //                 default:
                    //                     document.getElementById("umessages_success_list").style.display = "";
                    //                     break;
                    //             }
                    //             break;
                    //     }

                        switch (parseInt(document.getElementById("umessage_" + umessage_type + "_notification").innerHTML)) {
                                    case 0:
                                        document.getElementById("umessages_" + umessage_type + "_list").style.display = "none";
                                        break;
                                    case 1:
                                        document.getElementById("umessages_" + umessage_type + "_list").style.display = "";
                                        break;
                                    default:
                                        document.getElementById("umessages_" + umessage_type + "_list").style.display = "";
                                        break;
                                }

                    if (document.getElementById("umessage_notification").innerHTML==1) {
                            document.getElementById("umessage_notification_msg").innerHTML = 'Έχετε ' + document.getElementById("umessage_notification").innerHTML + ' νέα ειδοποίηση!';
                        } else if (document.getElementById("umessage_notification").innerHTML>1) {
                            document.getElementById("umessage_notification_msg").innerHTML = 'Έχετε ' + document.getElementById("umessage_notification").innerHTML + ' νέες ειδοποιήσεις!';
                        }
                        else {
                            document.getElementById("umessage_notification_msg").innerHTML = 'Δεν έχετε καμία νέα ειδοποίηση!';
                        }

                    if (document.getElementById("umessage_" + umessage_type + "_notification").innerHTML==1) {
                            document.getElementById("umessage_" + umessage_type + "_msg").innerHTML = ' Νέα ' + umessage_type_text + ' !';
                        } else if (document.getElementById("umessage_" + umessage_type + "_notification").innerHTML>1) {
                            document.getElementById("umessage_" + umessage_type + "_msg").innerHTML = ' Νέες ' + umessages_type_text + ' !';
                        }
                        else {
                            document.getElementById("umessage_" + umessage_type + "_msg").innerHTML = ' - ';
                        }  

            }
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});