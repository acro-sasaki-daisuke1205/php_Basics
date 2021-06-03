<?php //HTMLと組み合わせる場合は、閉じタグが必要

declare(strict_types=1); //引数の型を厳密にチェックする場合は、declareを使用。

echo 'こんにちは。' . PHP_EOL; //echoで出力。PHP_EOLで改行。

$name = '佐々木大輔'; //$変数名で宣言。

$text = <<<EOT
こんにちは。
  私は $name です。
PHPの勉強をしています。
EOT;

echo $text;
//<<<''で集団記号。中に複数の文章を入れられる。改行や字下げも反映される。<<<''の後は必ず改行。コメントも書いてはいけない。
//''を""に変えることで、中に変数を埋め込むことができる。''の書き方をナウドキュメント、""の書き方をヒアドキュメントと呼ぶ。

//10 ** 3で10の3乗。

echo 2 + '3';//このコードはエラーにはならず、5と出力される。注意。

//define('NAME', 'sasaki');
const NAME = 'sasaki'; //定数の宣言にはdefine()と、constを使った二つの方法がある。

$a = 10;
$b = 'よろしく。';
var_dump($a);
var_dump($b); //var_dumpを用いて変数の型を調べられる。

$a = (float)10; //型を変換する場合、()内に変更したい型を書き込む。

$score = 75; //if文はjavaの書き方とほぼ同じ。
if($score >= 70) {
  echo '素晴らしい！' . PHP_EOL;
} elseif($score >50) {
  echo '合格！'. PHP_EOL;
} else {
  echo 'あと少し…' . PHP_EOL;
}
$name = 'sasaki';
if ($score >= 70 && $name === 'sasaki') { //&&, and でかつ、|| or でまたは、! で～ではない。

}

$signal = 'blue';

switch($signal) {
case 'red':
    echo 'Stop!' . PHP_EOL;
    break;
case 'yellow':
    echo 'Caution!' . PHP_EOL;
    break;
case 'blue':
case 'green':
    echo 'Go!' . PHP_EOL;
    break;
}
//switch文の書き方もjavaとほぼ同じ。

for ($i = 1; $i <= 10; $i++) {
  if($i % 4 === 0)
  continue;

  echo "$i - こんにちは。" . PHP_EOL;
}
//for文の書き方もjavaとほぼ同じ。
//continueを付けると条件に合致すると処理をスキップ。
//breakを付けると、処理をそこで終了させる。

$hp = 100;

while ($hp > 0) {
  echo "Your HP: $hp" . PHP_EOL;
  $hp -= 15;
}

// do {
//   echo "Your HP: $hp" . PHP_EOL;
//   $hp -= 15;
// }
// while ($hp > 100);

// while文もjavaとほぼ同じ。do while文を使えば最低でも一回は処理が行われる。

function showAd($message = 'Ad') {
  echo '----------' . PHP_EOL;
  echo '--- ' . $message . ' ---' . PHP_EOL;
  echo '----------' . PHP_EOL;
}

echo ('おはよう。') . PHP_EOL;
showAd('header_ad');
echo ('こんにちは。') . PHP_EOL;
showAd();
echo ('こんばんは。') . PHP_EOL;
showAd('footer_ad');
echo ('おやすみ。') . PHP_EOL;
//function 関数名()で関数を定義。()内には引数も定義できる。引数=で初期値を定義。
$rate = 2;
function sum($a, $b, $c) {
  global $rate;
  return ($a + $b + $c) * $rate . PHP_EOL;
}
echo sum(100, 200, 300) + sum(200, 400, 600);//returnで値を返す事が出来る。

//PHPは関数の外で定義された変数を関数内で使う事が出来ない。
//globalを頭に付けることで、外の変数を関数の中で使う事が出来る。

$sum = function ($a, $b, $c) {//無名関数
  global $rate;
  return ($a + $b + $c) * $rate . PHP_EOL;
};

echo $sum(100, 300, 500) . PHP_EOL;
//変数に関数を代入することが可能。

// function sum($a, $b, $c) 
// {
//   return $a + $b + $c;
// }
// if ($total < 0) {
//   return 0;
// } else {
//   return $total;
// }
// return $total < 0 ? 0 : $total;
//上のif文を下のような条件演算子で表現する事が出来る。

// function getAward(int $score): ?string {
//   return $score >= 100 ? 'Gold Medal' : null;
// }
// //引数、返り値の方は指定ができる。: 型名で返り値の型を指定している。型の前に?を付けることで、その値にnullを入れる事が可能になる。
// echo getAward(150);
// echo getAward(40);

$scores = [
 'first' => 90,
 'second' => 40,
 'third' => 100
];
//上のように配列を定義することが可能。=>を使うことで、配列のキーを０,１,２…のような連番から変更する事が出来る。
echo $scores['second'] . PHP_EOL;

print_r($scores);
var_dump($scores);//この二つの書き方で配列の中身を詳しく表示できる。

foreach ($scores as $score) {
  echo $score . PHP_EOL;
}
//foreach文を使用することで、配列から要素を一つずつ取り出し、それぞれの値を使って中の処理を実行する事が出来る。
foreach ($scores as $key => $score) {
  echo $key . ' - ' . $score . PHP_EOL;
}
//asの後に$key =>と書くことで、配列のキーを表示する事が出来る。(keyは表示させなくてもよい)

$morescores = [
  55,
  72,
];

$twoscores = [
  50,
  70,
  ...$morescores,
  85
];
//...を使うことで、配列内に配列を展開できる。
print_r($twoscores);

function getStats(...$numbers) {
  //引数の頭に...を付けることで可変長引数を使用できる。渡された要素を配列の中に入れてくれる。
 $total = 0;
 foreach ($numbers as $number) {
   $total += $number;
 }
 return [$total, $total / count($numbers)];
 //返り値を配列にすることも可能。
}

print_r(getStats(1, 3, 5)) . PHP_EOL;

list($sum, $avarage) = getStats(1, 3, 5);
[$sum, $avarage] = getStats(1, 3, 5);
//返り値を配列に代入することもできる。

echo $sum . PHP_EOL;
echo $avarage . PHP_EOL;