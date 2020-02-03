<?РНР
/ * * @var \Bitrix\Sale\BasketItem [] $arItems */
?>
< ul  class = "список товаров" >
    <? foreach ($ arItems  as  $ item): ?>
        < li  class = "list-products_ _ item item" >
            < a  class = "item_ _ link" href ="=  '//' . SITE_SERVER_NAME . $ item - > > getField ('DETAIL_PAGE_URL')?>"><?=  $ item - > > getField ('NAME')?> > < / a>
        < / li>
    <? endforeach; ?>
< / ul> 