import pandas as pd
import numpy as np
#入力読み込み
import sys
#graph
import matplotlib.pyplot as plt


#DataFrame格納
df_sample_csv = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + sys.argv[1] + "/sample", skiprows=19, skipfooter=0, engine='python', header=None)
df_blank_csv = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + sys.argv[1] + "/blank", skiprows=19, skipfooter=0, engine='python', header=None)

###csv###
#csv用DateFrame作成
polarization = df_sample_csv[1] - df_blank_csv[1]
df_sample_csv[1] = polarization

#csv保存
df_sample_csv.to_csv("/Users/akp_kick6/development/LabTools/public/img/cd_csv/" + sys.argv[3], header=None, index=None)


###グラフ描画###
#DataFrame格納
df_data = pd.read_csv("/Users/akp_kick6/development/LabTools/public/img/cd_csv/" + sys.argv[3], header=None)

#偏光度(縦軸)
pola = df_data[1]

#波長(横軸,200-260)
wavelength = df_data[0]

#グラフ作成
plt.plot(wavelength, pola)
#最大値,最小値
plt.xlim(float(sys.argv[5]), float(sys.argv[4]))
plt.ylim(float(sys.argv[7]), float(sys.argv[6]))
#目盛り間隔
plt.xticks( np.arange(float(sys.argv[5]), float(sys.argv[4])+1, step=float(sys.argv[8])))
plt.yticks( np.arange(float(sys.argv[7]), float(sys.argv[6])+1, step=float(sys.argv[9])))
#目盛り線
plt.grid()
#軸ラベル
plt.title("CD")
plt.xlabel("Wavelength[nm]")
plt.ylabel("CD[mdeg]")
#保存
plt.savefig('../../../../public/img/cd_graph/' + sys.argv[2])