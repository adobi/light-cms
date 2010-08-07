
    <p><a href = "<?= BASE_URL ?>">Go back</a></p>
    
    <?php echo Display::errors($errors); ?>

    <form action="<?= BASE_URL ?>login" method="post" accept-charset="utf-8" id = "login-form">
        
        <fieldset>
            <legend>Login</legend>
            
            <p>
                <label for = "username">Username</label>
                <input type="text" name="username" value="" id="username" size = "30" class = "required" />
                <span class = "error-msg"></span>
            </p>
            <p>
                <label for = "password">Password</label>
                <input type="password" name="password" value="" id="password" size = "30" class = "required" />
                <span class = "error-msg"></span>
            </p>            
            
        </fieldset>
        
        <fieldset>
            <input type="submit" value="Login" />
        </fieldset>
    
    </form>
