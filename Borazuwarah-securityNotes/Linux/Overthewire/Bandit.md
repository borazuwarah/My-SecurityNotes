https://overthewire.org/wargames/bandit/
1 - connexión
 cat readme
 The password you are looking for is: ZjLjTmM6FvvyRnrb2rfNWOZOTa6ip5If

2 fichero con nombre especial, hay que dar la ruta absoluta
cat ./-
263JGJPfgU6LtdEvgfWU1XP5yac29mFx

3  Leer fichero con espacio en el nombre
cat spaces\ in\ this\ filename
MNk8KNH3Usiio41PRUEoDFPqfxLPlSmx

4 cd inhere
cat ...Hiding-From-You
2WmrDFRmJIq3IPxneAaMGhap0pFhF3NJ

5 file  ./-file0*
cat ./-file07
4oQYVPkxZOOEOO5pTW81FB8j8lxXGUQw

6 encontrar
find ./ -type f -size 1033c
./maybehere07/.file2
cat maybehere07/.file2
HWasnPhtq9AVKe0dmk45nxy20cvUa6EG

7 find / -type f -size 33c -user bandit7 -group bandit6 2>/dev/null
cat /var/lib/dpkg/info/bandit7.password
morbNTDkSW6jIlUc0ymOdMaLnOlFVAaj

8 find / -type f -name "data.txt" 2>/dev/null
grep "millionth" data.txt
millionth       dfwvzFQi4mU0wfNbFOe9RoWskMLg7eEc

9 sort data.txt  | uniq -u
4CKMh1JI91bUIZZPXDqGanal4xvAg0JM

10 strings data.txt
D9========== FGUW5ilLVJrxX9kMYMmlN4MgbpfMiqey
 strings data.txt | grep "=="
}========== the
3JprD========== passwordi
~fDV3========== is
D9========== FGUW5ilLVJrxX9kMYMmlN4MgbpfMiqey


11 cat data.txt |base64
VkdobElIQmhjM04zYjNKa0lHbHpJR1IwVWpFM00yWmFTMkl3VWxKelJFWlRSM05uTWxKWGJuQk9W
bW96Y1ZKeUNnPT0K
cat data.txt | base64 -d
The password is dtR173fZKb0RRsDFSGsg2RWnpNVj3qRr



12 mover posiciones en la salida: 13 posiciones
cat data.txt | tr 'A-Za-z' 'N-ZA-Mn-za-m'
The password is 7x16WNeHIi5YkIhWsfFIqoognUTyj9Q4

13
 tar xf data.tar
 ls
data8.bin  data.tar
 file data8.bin
 mv data8.bin  data.gz
ls
data.gz  data.tar
 gzip -d data.gz
ls
cat data
The password is FO5dwFsc0cbaIiH0h8J2eUks2vdTDwAn


14 ssh -i sshkey.private bandit14@localhost -p2220
/etc/bandit_pass$ cat bandit14
MU4VWeTyJk8ROof1qqmcBPaLh7lDCPvS

15 nc localhost 30000
MU4VWeTyJk8ROof1qqmcBPaLh7lDCPvS
Correct!
8xCjnmgoKbGLhHFAZlGE5Tmu4M2tKJQo

16 nmap 127.0.0.1 -p 31000-32000
Starting Nmap 7.94SVN ( https://nmap.org ) at 2024-12-10 13:10 UTC
Nmap scan report for localhost (127.0.0.1)
Host is up (0.00016s latency).
Not shown: 996 closed tcp ports (conn-refused)
PORT      STATE SERVICE
31046/tcp open  unknown
31518/tcp open  unknown
31691/tcp open  unknown
31790/tcp open  unknown
31960/tcp open  unknown






