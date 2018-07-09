#!coding=utf8

import logging
logging.getLogger("scapy.runtime").setLevel(logging.ERROR)


from scapy.all import *
import threading
import Queue


queue = Queue.Queue()


def worker(iface='eth0'):



    while not queue.empty():


        u = queue.get()
        ip_id = random.randint(1, 65535)
        icmp_id = random.randint(1, 65535)
        icmp_seq = random.randint(1, 65535)

        packet = IP(dst=str(u), ttl=64, id=ip_id) / ICMP(id=icmp_id, seq=icmp_seq) / b'test'
        ping = sr1(packet, timeout=2, verbose=False,iface=iface)

        if str(ping) == 'None':
            print u, '------->关闭'
        else:
            print u, ' 存活------->'
        queue.task_done()


def scan(IP=[],iface='',thread=10):

    for x in IP:

        queue.put(str(x))

    for i in range(thread):
        t = threading.Thread(target = worker,args=(iface,))

        t.daemon = True
        t.start()
    queue.join()

