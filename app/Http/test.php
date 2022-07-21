#入力読み込み
import sys

#test
public function cdpython2(Request $request) {
    $files = $request["set"];
    $command = "cd /Users/akp_kick6/development/LabTools/app/Http/Python/CD && echo $files | python cd_1.py";
    exec($command, $output);
}


    Storage::put('sample.txt', $sample);    
    Storage::put('blank.txt', $blank);

$command = "cd /Users/akp_kick6/development/LabTools/app/Http/Python/CD && python cd_1.py";
        exec($command, $output);

#test DataFrame格納
file = sys.stdin.read()
df_sample = pd.read_table("file[sample]", skiprows=19, skipfooter=0, engine='python', header=None)
df_blank = pd.read_table("file[blank]", skiprows=19, skipfooter=0, engine='python', header=None)


#DataFrame格納
df_sample = pd.read_table("D3-His-25.txt", skiprows=19, skipfooter=0, engine='python', header=None)
df_blank = pd.read_table("blank-25.txt", skiprows=19, skipfooter=0, engine='python', header=None)


#python, plt.showの後
token = np.random.random(1000)           #ランダムな数生成
file_name = f"output_{token}.png"        #ランダムな名前＋.png?
plt.savefig(file_name)                   #ランダムな名前のpngファイルを保存

#cdfile削除
Storage::deleteDirectory('cdfile');

#argvを文字列に変換
sample_argv = str(sys.argv[1])
blank_argv = str(sys.argv[2])

#DataFrame格納
#df_sample = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/cdfile/sample", skiprows=19, skipfooter=0, engine='python', header=None)
#df_sample = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/cdfile/" + sys.argv[1], skiprows=19, skipfooter=0, engine='python', header=None)
#df_blank = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/cdfile/" + sys.argv[2], skiprows=19, skipfooter=0, engine='python', header=None)

#一意になるファイル名指定
$seed1 = Str::random(4);
$seed2 = Str::random(4);
$sample_file = 'sample'.$seed1;
$blank_file = 'blank'.$seed2;

#ランダムな名前のファイルを一時保存
Storage::putFileAs('cdfile', $sample, $sample_file);
Storage::putFileAs('cdfile', $blank, $blank_file);

$command = "cd /Users/akp_kick6/development/LabTools/app/Http/Python/CD && python cd_1.py $sample_file $blank_file";
exec($command, $output);

#グラフファイル名作成,保存(python)
dat = string.digits + string.ascii_lowercase + string.ascii_uppercase           # 英数字をすべて取得
token = ''.join([random.choice(dat) for i in range(4)])                         # 英数字からランダムに4文字取得
file_name = 'graph_' + token + '.png'

