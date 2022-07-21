import pandas as pd
import numpy as np
#入力読み込み
import sys
#graph
import matplotlib.pyplot as plt
#ランダムな文字列生成
import random
import string


#DataFrame格納
df_sample = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + sys.argv[1] + "/sample", skiprows=19, skipfooter=0, engine='python', header=None)
df_blank = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + sys.argv[1] + "/blank", skiprows=19, skipfooter=0, engine='python', header=None)

#偏光度抽出(Series,一次元配列,縦軸)
df_sample_columns = df_sample[1]
df_blank_columns = df_blank[1]

#波長抽出(横軸,200-260)
wavelength = df_sample[0]

#縦軸有効値算出
polarization = df_sample_columns - df_blank_columns

print(df_sample_columns)
print(df_blank_columns)
print(polarization)
print(wavelength)

#グラフ作成
plt.plot(wavelength, polarization)
plt.title("CD")
plt.xlabel("wavelength")
plt.ylabel("polarization")


plt.savefig('Graph/' + sys.argv[2])
