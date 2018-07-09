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
        arpPkt = Ether(dst="ff:ff:ff:ff:ff:ff") / ARP(pdst=u, hwdst="ff:ff:ff:ff:ff:ff")
        res = srp1(arpPkt, timeout=1, verbose=0,iface=iface)
        if res:
            print "IP: " + res.psrc + "     MAC: " + res.hwsrc
        queue.task_done()


def scan(IP=[],iface='',thread=10):


    for x in IP[:-1]:
        queue.put(str(x))

    for i in range(thread):
        t = threading.Thread(target = worker,args=(iface,))

        t.daemon = True
        t.start()
    queue.join()

