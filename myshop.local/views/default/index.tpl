{foreach $rsProducts as $item name = products}

    <div style="float:left; padding: 0 30px 40px 0;">
        <a href="../www/images/product/{$item['id']}.jpg">
            
            <img src ="../www/images/product/{$item['id']}.jpg" width ='100'/>
        </a><br />
        <a href="../www/images/product/{$item['id']}.jpg">{$item['name']}</a>
    </div>
    
    {if $smarty.foreach.products.iteration mod 3 == 0}
        
        <div style='clear: both;'></div>
    {/if}
    
{/foreach}
    