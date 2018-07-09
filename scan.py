#!coding=utf8
import sys
import link.link_scan
import ip.ip_discover
import transport.transport_scan
import help.help
import IPy


#获取输入的ip
def netIp(preIp=''):
    Ip = []

    ip=preIp[0:preIp.find('/')]
    netmask=preIp[preIp.find('/')+1:]

    if netmask=='32':
        Ip.append(ip)
    else:
        IP=IPy.IP(ip)
        for i in IP.make_net(netmask)[1:-1]:
            Ip.append(i)

    return Ip



#获得输入的port
def getport(port=''):
    Port=[]
    if '-' in port:
        port1=port[0:port.find('-')]
        port2=port[port.find('-')+1:]

        for x in range(int(port1),int(port2)+1):

            Port.append(x)

    else:
        Port.append(port)

    return Port


def main():

    #参数帮助选项

    if(len(sys.argv)==1 or sys.argv[1]=='-help' ):
        help.help.conhelp()
        exit(0)
    else:

        iface=sys.argv[-2]
        thread=sys.argv[-1]


        if(sys.argv[1]=='-link'):
            ipArgv = sys.argv[2]

            link.link_scan.scan(netIp(ipArgv),iface,int(thread))
        elif(sys.argv[1]=='-ip'):

            ipArgv=sys.argv[2]
            ip.ip_discover.scan(netIp(ipArgv),iface,int(thread))

        elif(sys.argv[1]=='-transport'):

            ipArgv = sys.argv[2]
            portArgv = sys.argv[3]

            transport.transport_scan.scan(netIp(ipArgv),getport(portArgv),iface,int(thread))


if __name__ == '__main__':

    main()

