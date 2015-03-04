<div id="content_login"> 
    <form action="/login/confirmlogin" method="post">
        <div class="errors">{message}</div>
        <table id="login_table">
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input id="username" name="username" type="text"></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input id="password" name="password" type="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
    <p id="new_account"> <a href={href}>Create a new account</a> </p>
</div>

