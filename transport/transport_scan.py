#!coding=utf8


import logging
logging.getLogger("scapy.runtime").setLevel(logging.ERROR)


from scapy.all import *
import threading
import Queue


queue = Queue.Queue()
queue1 = Queue.Queue()



def worker1(iface='eth0',port=[]):
    while not queue1.empty():


        u = queue1.get()
        for y in port:

            dst_timeout = 2
            src_port = RandShort()
            dst_ip = str(u)
            dst_port = y
            udp_scan_resp = sr1(IP(dst=dst_ip) / UDP(dport=int(dst_port), sport=src_port), timeout=dst_timeout,
                                verbose=False,iface=iface)
            if (udp_scan_resp is None):

                print u, ':', y, "------->Open|Filtered</br>"
            elif (udp_scan_resp.haslayer(UDP)):

                print u, ':', y, "<---Open---></br>"
            elif (udp_scan_resp.haslayer(ICMP)):

                if (int(udp_scan_resp.getlayer(ICMP).type) == 3 and int(udp_scan_resp.getlayer(ICMP).code) == 3):

                    print u, ':', y, "--->Closed<---</br>"
                elif (int(udp_scan_resp.getlayer(ICMP).type) == 3 and int(udp_scan_resp.getlayer(ICMP).code) in [1,
                                                                                                                 2,
                                                                                                                 9,
                                                                                                                 10,
                                                                                                                 13]):

                    print u, ':', y, "<-------Filtered</br>"

        queue1.task_done()



def worker(iface='eth0'):



    while not queue.empty():


        u = queue.get()

        ip_id = random.randint(1, 65535)
        icmp_id = random.randint(1, 65535)
        icmp_seq = random.randint(1, 65535)

        packet = IP(dst=str(u), ttl=64, id=ip_id) / ICMP(id=icmp_id, seq=icmp_seq) / b'test'
        ping = sr1(packet, timeout=2, verbose=False,iface=iface)

        if str(ping) == 'None':
            print u, '------->关闭</br>'
        else:
            queue1.put(u)
        queue.task_done()


def scan(IP=[],port=[],iface='',thread=10):

    for x in IP:

        queue.put(str(x))

    for i in range(thread):
        t = threading.Thread(target = worker,args=(iface,))

        t.daemon = True
        t.start()
    queue.join()

    for i in range(thread):

        t = threading.Thread(target = worker1,args=(iface,port,))

        t.daemon = True
        t.start()
    queue1.join()
