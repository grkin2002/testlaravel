<h3>this is a test page</h3>

<?php
$users = DB::table('users')->get();
dd($users);
