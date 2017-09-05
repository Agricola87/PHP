 
        {* Левый столбец*}
        <div id="leftColumn">
            
            <div id="leftMenu">
                <div class="menuCaption">Меню:</div>
                {foreach $rsCategories as $item}
                    <a href="/myshop.local/www/category/{$item['id']}/">{$item['name']}</a><br />
                    
                    {if isset($item['children'])}
                        
                        {foreach $item['children'] as $itemChild}
                        
                            --<a href="/myshop.local/www/category/{$itemChild['id']}/">{$itemChild['name']}</a><br />
                        {/foreach}
                    {/if}
                {/foreach}
            </div>
            
            {if isset($arUser)}
            
                <div id="userBox">
                    
                    <a href="/myshop.local/www/user/" id="userLink">{$arUser['displayName']}</a><br />
                    <a href="/myshop.local/www/user/logout/" onClick="logout();">Выход</a><br />
                    
                </div>
            {else}
            
            <div id="userBox" class="hideMe">
                
                <a href="#" id="userLink" ></a><br />
                <a href="/myshop.local/www/user/logout/" onClick="logout();">Выход</a>
            </div>
            
            {if ! isset($hideLoginBox)}
                <div id="loginBox">

                    <div class="menuCaption">Авторизация</div>
                    <input type="text" id="loginEmail" name="loginEmail" value="" />
                    <input type="password" id="loginPwd" name="loginPwd" value="" />
                    <input type="button" onClick="login();" value="Войти" />
                </div>

                <div id="registerBox">

                    <div class="menuCaption showHidden" onClick="showRegisterBox();">Регистрация</div>
                    <div id="registerBoxHidden">

                        email:<br>
                        <input type="text" id="email"  name="email" value="" /><br />
                        пароль: <br />
                        <input type="password" id="pwd1" name="pwd1" value="" /><br />
                        повторить пароль: <br/>
                        <input type="password" id="pwd2" name="pwd2" value="" /><br />
                        <input type="button" onClick="registerNewUser()" value="Зарегистрироваться" />
                    </div>
                </div>
            {/if}
            {/if}
            
            
            <div class="menuCaption">Корзина</div>
            <a href ="/myshop.local/www/cart/" title ="Перейти в корзину">В корзине</a>
            <span id="cartCntItems">
                {if $cartCntItems > 0}{$cartCntItems}{else}пусто{/if}
        </span>
        </div>