<div id="content_main"> 
    <h2>User Registration</h2>
    <div class="errors">{message}</div>
    <form method="post" action="/register/do_upload" enctype="multipart/form-data" />
        <label for="username">Username:</label>
        <input id="username" type="text" name="username" maxlength="24">
        <br>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" maxlength="24">
        <br>
        <label for="file">(optional) Profile Image (.gif/.jpg/.png, max 128x128):</label>
        <input type="file" name="userfile" accept="image/*" />
        <br>
        <input type="submit" value="Register">
    </form> 
</div>

