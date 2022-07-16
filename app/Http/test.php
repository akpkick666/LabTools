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