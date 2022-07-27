#import random 
from random import sample
import pandas as pd
import numpy as np
#入力読み込み
import sys
#graph
import matplotlib.pyplot as plt


#DataFrame格納
df_sample = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + sys.argv[1] + "/sample", skiprows=19, skipfooter=0, engine='python', header=None)
df_blank = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + sys.argv[1] + "/blank", skiprows=19, skipfooter=0, engine='python', header=None)

#偏光度抽出(Series,一次元配列,縦軸)
#縦軸有効値算出
#df_sample_columns = df_sample[1]
#df_blank_columns = df_blank[1]
polarization = df_sample[1] - df_blank[1]


#波長抽出(横軸,200-260)
wavelength = df_sample[0]

#グラフ作成
plt.plot(wavelength, polarization)
plt.title("CD")
plt.xlabel("Wavelength[nm]")
plt.ylabel("CD[mdeg]")
plt.savefig('../../../../public/img/cd_graph/' + sys.argv[2]) 

#csv保存
df_sample_csv = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + sys.argv[1] + "/sample", skiprows=19, skipfooter=0, engine='python', header=None)
df_blank_csv = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + sys.argv[1] + "/blank", skiprows=19, skipfooter=0, engine='python', header=None)
df_sample_csv.to_csv("/Users/akp_kick6/development/LabTools/public/img/cd_csv/" + sys.argv[3])
df_blank_csv.to_csv("/Users/akp_kick6/development/LabTools/public/img/cd_csv/" + sys.argv[4])


