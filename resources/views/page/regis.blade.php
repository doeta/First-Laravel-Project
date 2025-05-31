@extends('layouts.master')
@section('title')
    Halaman Form
@endsection
@section('content')
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up Form</h2>
    <form action="/welcome" method="POST">
        @csrf
        <label for="first-name">First Name: </label> <br>
        <input type="text" name="first_name" id="first-name" > <br> <br>
        <label for="last-name">Last Name: </label> <br>
        <input type="text" name="last_name" id="last-name" > <br> <br>
        <label for="gender">Gender:</label><br>
        <input type="radio" name="gender"> Male <br>
        <input type="radio" name="gender"> Female <br>
        <input type="radio" name="gender"> Other <br> <br>
        <label for="nationality">Nationality:</label><br><br>
        <select name="nationality">
            <option value="1">Indonesian</option>
            <option value="2">Singaporean</option>
            <option value="3">Malaysian</option>
            <option value="4">Australian</option>
        </select><br><br>
        <label for="language_spoken">Language Spoken</label><br>
        <input type="checkbox" name="language_spoken" value="1">Bahasa Indonesia <br>
        <input type="checkbox" name="language_spoken" value="2">English <br>
        <input type="checkbox" name="language_spoken" value="3">Other <br><br>
        <label>Bio:</label><br>
        <textarea name="Bio" cols="30" rows="10"></textarea> <br>
        <input type="submit" value="Sign Up">
    </form>
@endsection