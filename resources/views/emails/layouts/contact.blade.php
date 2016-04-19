<p>
    Λάβατε ένα μήνυμα από το TiPosPu.
</p>
<p>
    Τα στοιχεία είναι:
</p>
<ul>
    <li>Όνομα: <strong>{{ $name }}</strong></li>
    <li>Email: <strong>{{ $email }}</strong></li>
</ul>
<hr>
<p>
    @foreach ($messageLines as $messageLine)
    {{ $messageLine }}<br>
    @endforeach
</p>
<hr>
