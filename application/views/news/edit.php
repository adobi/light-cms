
    <form action="<?= BASE_URL ?>edit/<?php echo $param ?>" method="post" accept-charset="utf-8" id = "login-form">
        
        <fieldset>
            <legend>Hírek</legend>
            
            <p>
                <label for = "username">Hír címe:</label>
                <input type="text" name="title" value="" id="title" size = "30" class = "required" />
                <span class = "error-msg"></span>
            </p>
            <p>
                <label for = "url">Url:</label>
                <input type="text" name="url" value="" id="url" size = "30" class = "required" />
                <span class = "error-msg"></span>
            </p>            
            <p>
                <label for = "content">Tartalom:</label>
                <input type="text" name="content" value="" id="content" size = "30" class = "required" />
                <span class = "error-msg"></span>
            </p>             
        </fieldset>
        
        <fieldset>
            <input type="submit" value="Login" />
        </fieldset>
    
    </form>