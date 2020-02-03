<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->addExternalCss("/bitrix/css/main/font-awesome.css");
CJSCore::Init(array("ajax"));

//Let's determine what value to display: rating or average ?
if ($arParams["DISPLAY_AS_RATING"] == "vote_avg") {
    if ($arResult["PROPERTIES"]["vote_count"]["VALUE"]) {
        $DISPLAY_VALUE = round($arResult["PROPERTIES"]["vote_sum"]["VALUE"] / $arResult["PROPERTIES"]["vote_count"]["VALUE"],
            2);
    } else {
        $DISPLAY_VALUE = 0;
    }
} else {
    $DISPLAY_VALUE = $arResult["PROPERTIES"]["rating"]["VALUE"];
}
$voteContainerId = 'vote_' . $arResult["ID"];
?>
<div class="product-vote product-vote__inner" id="<? echo $voteContainerId ?>">
    <?
    $onclick = "JCFlatVote.do_vote(this, '" . $voteContainerId . "', " . $arResult["AJAX_PARAMS"] . ")";
    foreach ($arResult["VOTE_NAMES"] as $i => $name) {
        if ($DISPLAY_VALUE && round($DISPLAY_VALUE) > $i) {
            $className = "fa fa-star";
        } else {
            $className = "fa fa-star-o";
        }

        $itemContainerId = $voteContainerId . '_' . $i;
        ?><i
        class="<?
        echo $className ?> product-vote__star"
        id="<?
        echo $itemContainerId ?>"
        title="<?
        echo $name ?>"
        onmouseover="JCFlatVote.trace_vote(this, true);"
        onmouseout="JCFlatVote.trace_vote(this, false)"
        onclick="<?
        echo htmlspecialcharsbx($onclick); ?>"
        ></i><?
    }
    if ($arParams["SHOW_RATING"] == "Y"):?>
        (<?
        echo $DISPLAY_VALUE ?>)
    <?endif;
    ?>
</div>