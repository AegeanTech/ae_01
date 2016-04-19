@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Ειδοποίηση!</strong>
        Υπήρξε κάποιο πρόβλημα με τα στοιχεία που δώσατε.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif