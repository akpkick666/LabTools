import pandas as pd
import numpy as np
#入力読み込み
import sys
#graph
import matplotlib.pyplot as plt
#table画像保存
import dataframe_image as dfi
#引数
import argparse

#コマンドライン引数
parser = argparse.ArgumentParser(description='ExecControllerから値受け取り')
parser.add_argument('--cd_dir')
parser.add_argument('--x_max', type=float)
parser.add_argument('--x_min', type=float)
parser.add_argument('--y_max', type=float)
parser.add_argument('--y_min', type=float)
parser.add_argument('--x_space', type=float)
parser.add_argument('--y_space', type=float)
parser.add_argument('--data_dir')
parser.add_argument('--samples', required=True, nargs="*", help='a list of string variables') 
args = parser.parse_args()


df_blank_csv = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + args.cd_dir + "/blank", skiprows=19, header=None)
for sample in args.samples:
    #DataFrame格納
    df_sample_csv = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + args.cd_dir + "/" + sample, skiprows=19, header=None)
    #csv用DateFrame作成
    polarization = df_sample_csv[1] - df_blank_csv[1]
    df_sample_csv[1] = polarization
    #csv保存
    df_sample_csv.to_csv("/Users/akp_kick6/development/LabTools/public/img/cd/" + args.data_dir + "/" + sample + "_rowdata.csv", header=None, index=None)
    #sampleメタデータ
    df_meta_sample = pd.read_table("/Users/akp_kick6/development/LabTools/storage/app/" + args.cd_dir + "/" + sample, nrows=18, header=None)
    df_styled = df_meta_sample.style.background_gradient()
    dfi.export(df_styled.hide(axis='index').hide(axis='columns'), "/Users/akp_kick6/development/LabTools/public/img/cd/" + args.data_dir + "/" + sample + "_metadata.png")
    ###グラフ描画###
    #DataFrame格納
    df_data = pd.read_csv("/Users/akp_kick6/development/LabTools/public/img/cd/" + args.data_dir + "/" + sample + "_rowdata.csv", header=None)
    #偏光度(縦軸値)
    pola = df_data[1]
    #波長(横軸値,200-260)
    wavelength = df_data[0]
    #グラフ作成
    plt.plot(wavelength, pola, label=sample)



#最大値,最小値
plt.xlim(args.x_min, args.x_max)
plt.ylim(args.y_min, args.y_max)
#目盛り間隔
plt.xticks(np.arange(args.x_min, args.x_max+1, step=args.x_space))
plt.yticks(np.arange(args.y_min, args.y_max+1, step=args.y_space))
#目盛り線
plt.grid()
#軸ラベル
plt.title("CD")
plt.xlabel("Wavelength[nm]")
plt.ylabel("CD[mdeg]")
plt.legend()
#グラフ画像保存
plt.savefig("/Users/akp_kick6/development/LabTools/public/img/cd/" + args.data_dir + "/graph_data.png")
