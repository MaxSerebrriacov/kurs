 
iptables -F -t nat
iptables -t nat -A POSTROUTING -o ens192 ! -d 192.168.60.0/24 -j MASQUERADE
iptables -t nat -A POSTROUTING -o ens192 -d 192.168.60.1 -p udp --dport=53 -j MASQUERADE 


