#!coding=utf8

def conhelp():
    print '''
参数形式：python scan.py [-link IP] [-ip IP ] [-transport IP PORT] INTERFACE THREADS
-help 显示帮助页面
INTERFACE 指定发送网卡，默认为eth0，
THREADS 指定并发线程数，默认为10
IP 指定ip
    192.168.0.1/32 指定192.168.0.1这一确定ip
    192.168.0.1/24 指定192.168.0.1这一ip所在网段的ip域
    注意，-link 参数需指定本机某一确定ip所在的ip域，由此对该网段内的全部主机进行扫描
PORT
    默认扫描80端口
    80 指定某一端口
    80-3306 指定某一范围的端口

-link
    指定为内网扫描，结果为arp表，与其他可选参数冲突
-ip
    指定对ip或ip域进行主机发现扫描，与其他可选参数冲突            
-transport -p PORT
    指定对ip或ip域进行四层扫描,注意，此处的ip应当为存活主机ip，可借用三层扫描获得存活ip
    
        
'''

