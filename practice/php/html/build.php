<?php
$name = 'Apple';
$score = 32.246;

$info = "[$name] [$score]";
echo $info . PHP_EOL;

$info = sprintf("[%15s][%10.2f]", $name, $score);//sprintfを使うことで、表示する幅や小数点の第何位まで表示するか等を指定できる。
echo $info . PHP_EOL;

$info = printf("[%15s][%10.2f]", $name, $score);//printfでも同じように中の文字列をフォーマットを指定できる。二つの違いは値を返すか返さないか。

$input = ' dot_sasaki ';
$input = trim($input);//trimで両端のスペースを削除できる。

echo strlen($input) . PHP_EOL;//strlenで文字数を出力。
echo strpos($input, '_') . PHP_EOL;//strposで指定された文字が文字列の何番目にあるか出力。

$input = str_replace('_', '-', $input);//str_replaceで文字を二つ指定して、入れ替えている。
echo $input . PHP_EOL;

$input2 = ' こんにちは ';
$input2 = trim($input2);

echo mb_strlen($input2) . PHP_EOL;//日本語を扱う場合、mb_strlenを使用しないと上手く動作しない。(UTF-8であれば大丈夫)
echo mb_strpos($input2, 'に') . PHP_EOL;//日本語を扱う場合、mb_strposを使用しないと上手く動作しない。(UTF-8であれば大丈夫)

$input2 = str_replace('にち', 'ばん', $input2);
echo $input2 . PHP_EOL;

$input3 = '20210607Item-A  1200';

$date = substr($input3, 0, 8);//substrで文字列のどこからどこまでかを指定して文字列を取り出せる。
$product = substr($input3, 8,8);
$amount = substr($input3, 16);

echo $date . PHP_EOL;
echo $product . PHP_EOL;
echo $amount . PHP_EOL;

$input4 = 'Call us at 03-3001-1256 or 03-3015-3222';
$pattern = '/\d{2}-\d{4}-\d{4}/';

// preg_match($pattern, $input4, $matches);//preg_matchで正規表現で検索した文字列でヒットした最初の文字列を抽出できる。
// preg_match_all($pattern, $input4, $matches);//preg_match_allで正規表現で検索した文字列でヒットしたもの全てを抽出できる。
// print_r($matches);

$input4 = preg_replace($pattern, '**-****-****', $input4);//preg_replaceで正規表現で置換したい文字列を検索し、指定した文字に置き換える事が出来る。
echo $input4 . PHP_EOL;

$d = [2020, 11, 15];
echo "$d[0]-$d[1]-$d[2]" . PHP_EOL;
echo implode('-', $d) . PHP_EOL;
//implodeで配列の文字列を、指定した区切り文字で表示する事が出来る。 

$t = '17:32:45';
print_r(explode(':' , $t));
// explodeで指定した区切り文字で、文字列を区切り配列に入れる事が出来る。

$n = 5.6283;

echo ceil($n) . PHP_EOL; //6
echo floor($n) . PHP_EOL; //5
echo round($n) . PHP_EOL; //6
echo round($n, 2) . PHP_EOL; //5.63

echo mt_rand(1, 6) . PHP_EOL;//1～6までのランダムな数値

echo max(3, 9, 4) . PHP_EOL;//()内の最大値
echo min(3, 9, 4) . PHP_EOL;//()内の最小値

echo M_PI . PHP_EOL;//円周率
echo M_SQRT2 . PHP_EOL;//平方根


$scores = [30, 40, 50];

array_unshift($scores, 10, 20);//配列の頭に追加
array_push($scores, 60, 70);//配列の末尾に追加
$scores[] = 80;//配列の末尾に追加
array_shift($scores);//先頭の要素を削除
array_pop($scores);//末尾の要素を削除

print_r($scores);

$scores2 = [30, 40, 50, 60, 70];
$partial = array_slice($scores2, 2, 3);//指定された要素を切り出して新しい配列へ代入
// $partial = array_slice($scores2, 2);//末尾まで切り出す場合は二つ目の数字はいらない

print_r($scores2);
print_r($partial);

// array_splice($scores2, 2, 3);
// array_splice($scores2, 2, 3, 100);
array_splice($scores, 2, 0, [100, 101]);
//array_spliceで要素を削除してその空いた場所に要素を入れる事が出来る。指定の仕方は（配列名, 開始位置, 削除したい個数, 入れたい要素);

print_r($scores);

// array_merge();//配列の連結
// array_unique();//配列の中の同じ要素を一つに纏める
// array_diff();//一番目の配列から、二番目の配列の要素と同じ要素を消して連結
// array_intersect();//二つの配列の同じ要素のみで配列を作る

$prices5 = [100, 200, 300];

$newPrices = array_map(
  //array_mapで、第一引数に渡した関数を、第二引数に渡した配列の要素に実行できる
  // function($n) {return $n * 1.1;},
  fn($n) => $n * 1.1,
  $prices5
  );

  print_r($newPrices);


$numbers = range(1, 10);

$evenNumbers = array_filter(
//array_filterで、第一引数に渡した配列を第二引数で渡した条件式で評価し、TRUEの要素だけで新しい配列を作る事が出来る。
  $numbers,
//  function ($n) {
//    if ($n % 2 === 0) {
//      return true;
//    } else {
//      return false;
//    }
//    return $n % 2 === 0;
//  }
  fn($n) => $n % 2 === 0
);

print_r($evenNumbers);

$scores6 = [
  'taguchi' => 80,
  'hayashi' => 70,
  'kikuchi' => 60,
];

// $keys = array_keys($scores6);//配列のキーを取り出す
// print_r($keys);
// $values = array_values($scores6);//配列の値を取り出す
// print_r($values);

if(array_key_exists('taguchi', $scores6) === true) {
  //配列の中に条件に合うキーがあるか調べる。
  echo 'taguchi is here!' . PHP_EOL;
}
if (in_array(80, $scores6) === true) {
  //配列の中に条件に合う値があるか調べる。
  echo '80 is here!' . PHP_EOL;
}

echo array_search(70, $scores6) . PHP_EOL;//配列の値に付けられたキーを表示する。

// sort(); 値の上り順 但しキーが削除されて連番になってしまう
// rsort(); 値の下り順 但しキーが削除され連番になってしまう
// asort(); キーが削除されず、値の上り順
// arsort(); キーが削除されず、値の下り順
// ksort(); キーの上り順
// krsort(); キーの下り順


// $scores = [
//   'taguchi' => 80,
//   'hayashi' => 70,
//   'kikuchi' => 60,
// ];

$data = [
  ['name' => 'taguchi', 'score' => 80],
  ['name' => 'kikuchi', 'score' => 60],
  ['name' => 'hayashi', 'score' => 70],
  ['name' => 'tamachi', 'score' => 60],
];

usort(//配列内のキーを指定して、並べ替える事が出来る。
  $data,
  function ($a, $b) {
    if ($a['score'] === $b['score']) {
      return 0;//入れ替えなし
    }
    return $a['score'] > $b['score'] ? 1 : -1;
    //1は入れ替えあり、-1は入れ替えなし
  }
);

print_r($data);


$scores7 = array_column($data, 'score');//配列から指定したキーの値を取り出して新しい配列に代入
$names = array_column($data, 'name');

// print_r($scores7);
// print_r($names);

array_multisort(
  //複数の配列の要素毎に並べ替える事が出来る。要素毎で上り順か下り順かも指定が出来る。
  $scores7, SORT_DESC, SORT_NUMERIC,
  $names, SORT_DESC, SORT_STRING,
  $data
);

print_r($data);


$fp = fopen('names.txt', 'w');//ファイルを作成、 wでファイルに書き込める状態になる

fwrite($fp, "taro\n");//ファイルに書き込み

fclose($fp);//書き込みを終了

$fp = fopen('names.txt', 'a');//aで追記

fwrite($fp, "jiro\n");
fwrite($fp, "saburo\n");

fclose($fp);

$fp = fopen('names.txt', 'r');
$contents = fread($fp, filesize('names.txt'));//filesizeでファイルの中身を展開できる
fclose($fp);
echo $contents;

$fp = fopen('names.txt', 'r');
while (($line = fgets($fp)) !== false) {
  //fgetsでファイルの中身を一行ずつ展開できる
  echo $line;
}
fclose($fp);

$contents = "taro\njiro\nsaburo\n";
file_put_contents('names.txt', $contents);//ファイルを作成

$contents = file_get_contents('names.txt');//ファイルを展開
echo $contents;

$lines = file('names.txt', FILE_IGNORE_NEW_LINES);//ファイルの中身を一行ずつ配列に代入。FILE_IGNORE_NEW_LINES文字数からで空欄を除外。
var_dump($lines);

file_put_contents('data/taro.txt', "taro\n");
file_put_contents('data/jiro.txt', "taro\n");

$dp = opendir('data');//opendirでディレクトリの中身を取り出す。
while(($item = readdir($dp)) !== false) {
  //readdirでディレクトリの中身を１行ずつ取り出す。
  if ($item === '.' || $item === '..') {
    continue;
  }
  echo $item . PHP_EOL;
}

foreach (glob('data/*.txt') as $item) {//globでディレクトリ内のファイル一覧を取り出す
  echo $item . PHP_EOL;
  echo basename($item) . PHP_EOL;//basenaneでファイル名だけ取り出せる
}

// if (file_exists('data/saburo.txt') === false) {
  if (!file_exists('data/saburo.txt')) {
    echo 'Saburo not here!' . PHP_EOL;
    exit;//処理を終了
  }
  
  if (file_exists('data') === true) {//フォルダの存在を確認
    echo 'data exists!' . PHP_EOL;
  }
  
  if (is_writeable('data/taro.txt') === true) {//書き込み可能か確認
    echo 'taro is writable!' . PHP_EOL;
  }
  
  if (is_readable('data/taro.txt') === true) {//読み込み可能か確認
    echo 'taro is readable!' . PHP_EOL;
  }

//   time();//UNIXタイムスタンプ 現在日時を表示
// date();//date(フォーマット, UNIXタイムスタンプ)でより見やすく表示

// mktime();//mktime(時, 分, 秒, 月, 日, 年)と指定すればその日時のデータを取得できる。
// strtotime();//strtotime('+7 day');等の様に文字列で日時を指定できる。