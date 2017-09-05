<h1>
    Товары категории
</h1>

{foreach $rsProducts as $item name = products}

       <div style ="float: left; padding: 0 30px 40px 0;">
            
            <a href="/myshop.local/www/images/product/{$item['id']}.jpg">
            
                <img src = "/myshop.local/www/images/product/{$item['id']}.jpg"  width ='100' />
           </a><br />
           <a href="/myshop.local/www/product/{$item['id']}/">{$item['name']}</a>           
        </div>     
           
        {if $smarty.foreach.products.iteration mod 3 == 0 }
        
            <div style = 'clear: both;'></div>
        {/if}   
        
{/foreach}

{if  empty($rsProducts) && empty($rsChildCats)}
    <h1>Категория пустая</h1>
{/if}

{foreach $rsChildCats as $item name = "childCats"}
    <h2><a href="/myshop.local/www/category/{$item['id']}/">{$item['name']}</a></h2>
{/foreach}