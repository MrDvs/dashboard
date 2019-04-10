<?php  
$coins = DB::query('SELECT * FROM cryptos');

?>
<h4 style="float: left;">CRYPTO</h4>
<br>
<hr>



<?php
foreach ($coins as $coin) {
?>

<script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" data-currencyid="<?php echo $coin['cmc_id']; ?>" data-base="EUR" data-secondary="" data-ticker="true" data-rank="true" data-marketcap="true" data-volume="false" data-stats="EUR" data-statsticker="false"></div>

<?php
$json = json_decode(file_get_contents('https://widgets.coinmarketcap.com/v2/ticker/'.$coin['cmc_id'].'/?ref=widget&convert=EUR'))->data;
echo "Your ".$coin['amount']." ".$json->symbol." is worth ".$json->quotes->EUR->price * $coin['amount']; 
}
?>

<!-- <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" data-currencyid="1" data-base="EUR" data-secondary="" data-ticker="true" data-rank="true" data-marketcap="true" data-volume="true" data-stats="EUR" data-statsticker="false"></div> -->