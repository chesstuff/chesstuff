<?php
/**
 * A Testing module for cvd-viewer WordPress plugin
 * Author: Nikolai Pilafov
 * RunMe: [word press install folder]/wp-content/plugins/cvd-viewer/cvd-tester.php
 */

require( './cvd-viewer.php' );

function add_filter ( $s1, $s2 ) {}
function add_action ( $s1, $s2 ) {}

/**
 * originally the cvd-viewer plugin was relying more on the PHP's powerful regex functionality but
 * the following huge PGN input (~21K) would break both "preg_replace_callback" and "preg_split" functions
 * so I had no choice but to implement that part without using regex (aka manually)
 * if you want to confirm my observations you can use the previous version of cvd-viewer.php (under SVN)
 * which uses regex thoughout but fails to handle this "pgn_sample1" test.
 */

$pgn_sample1 = <<<EOPGN
<!-- ChessViewer Section Start -->
<pgn id="oChessViewer" onload='makeChessApplet ( null, { DarkSquares: "C58642", GameToSelect: "2" } );'>
[Event "Munich"]
[Site "Munich"]
[Date "1991.??.??"]
[Round "?"]
[White "Judit Polgar"]
[Black "Viswanathan Anand"]
[Result "1-0"]
[WhiteElo "?"]
[BlackElo "?"]
[ECO "C83"]
[EventDate "?"]
[PlyCount "129"]

1.e4 e5 2.Nf3 Nc6 3.Bb5 a6 4.Ba4 Nf6 5.0-0 Nxe4 6.d4 b5 7.Bb3 d5 8.dxe5 Be6 9.c3 Be7 10.Nbd2 Qd7
11.Bc2 Nxd2 12.Qxd2 Bg4 13.Qf4 Bxf3 14.Bf5 Qd8 15.Qxf3 Nxe5 16.Qe2 Qd6 17.Re1 Nc6 18.Bg5 Kf8 19.Be3
g6 20.Bh6+ Kg8 21.Qg4 Qf6 22.Bc2 Bf8 23.Bg5 Qd6 24.Bf4 Qd8 25.Rad1 Na5 26.h4 c6 27.h5 Nc4 28.hxg6
hxg6 29.b3 Nd6 30.Bxg6 fxg6 31.Re6 Rh7 32.Bxd6 Bg7 33.Rde1 Rh6 34.g3 Qd7 35.Bf4 g5 36.Bxg5 Rg6
37.Qf5 Rxe6 38.Qxe6+ Qxe6 39.Rxe6 Rc8 40.Bd2 Kf7 41.Re1 c5 42.Kf1 c4 43.bxc4 Rxc4 44.Rc1 Ke6 45.Ke2
d4 46.cxd4 Bxd4 47.Be3 Bb2 48.Rxc4 bxc4 49.Kd2 Bg7 50.Kc2 Kd5 51.f3 Bf6 52.Bh6 Be5 53.g4 Bd4 54.Bd2
Bb6 55.Bc1 Ba5 56.a4 Ke5 57.Bg5 Kd5 58.Bd2 Bc7 59.Bc3 Bf4 60.Bf6 Bg3 61.g5 Bh4 62.Bd8 Bf2 63.g6 Bd4
64.Ba5 Ke6 65.Bc3
1-0

[Event "Dos Hermanas"]
[Site "Dos Hermanas"]
[Date "1999.04.06"]
[Round "1"]
[White "Polgar, Judit"]
[Black "Anand, Viswanathan"]
[Result "1-0"]
[ECO "B81"]
[WhiteElo "2677"]
[BlackElo "2781"]
[PlyCount "68"]
[EventDate "1999.04.??"]

1.e4 c5 2.Nf3 d6 3.d4 cxd4 4.Nxd4 Nf6 5.Nc3 a6 6.Be3 e6 {One of three main moves in this position.
6...e5 was seen on the next board with the same success (Adams-Svidler), Kasparov's favourite
6...Ng4 will definitely be given a test some rounds later. The text move is, in my opinion, the most
demanding. Now, if White wants to fight for some opening advantage, he (sorry,she) has to be ready
for certain risks.} 7.g4 {And she's ready! After Linares-99 (Topalov-Kasparov and Anand- Kasparov)
English Attack (7.Qd2 or 7.f3) needs certain repairing period. So the text move remains the only
ambitious try as 7. Be2 Qc7 is just good version of Classical Scheveningen for Black.} e5
{Practically forces White to sacrifice a piece (or even two). Kasparov's 7...h6 8.f4 e5!? seems to
be a reliable option but maybe Vishy didn't like 8.h4!? played in his presence by Topalov a couple
of weeks before.}
 (7...h6 8.f4
  (8.h4 $5 e5 9.Nf5 g6 10.Nxh6 Bxh6 11.Bxh6 Bxg4 12.Qd2 $13 {Topalov-van Wely/Monaco act 1999})
 8...e5 $5 9.Nf5 h5 $1 {was in the tre of discussion in 1998. (Shirov-Kasparov/Linares 1998,
 Svidler-Topalov/ Elista ol 1998)})
8.Nf5 g6 9.g5 {Some "great annotator" gives the credit of inventing this sacrificial attempt to the
game Hazai-Dvoirys (Sochi 1982). With all respect to Laszlo Hazai we have to mention the real author
of this interesting idea - prematurely gone Hungarian sharp attacker IM Bela Perenyi who played it
in 2 games already in 1978. Now Judit tries to revive "Hungarian Attack".}
 (9.Bg2 $5 d5 $5
  (9...gxf5 10.exf5 h6 11.Qe2 Nc6 12.0-0-0 Rg8 13.h3 Qa5 14.f4 Bd7 15.a3 0-0-0 16.Qf2 $1 $36
  {Nikolenko,O-Vorobiov,E Moscow-ch op(07) 1995 1-0 28})
 10.Bg5 gxf5 11.Nxd5 Be7 12.Bxf6 Bxf6 13.exf5 h5 14.h3 Bd7 15.Qe2 hxg4 16.hxg4 Rxh1+ 17.Bxh1 Bc6 $13
 {Tolnai,T-Gavrikov,V Berlin 1989 19})
9...gxf5 10.exf5
 (10.gxf6 $6 f4 11.Bc4 Be6 12.Bxe6 fxe6 13.Qh5+ Kd7 14.Qf7+ Kc6 15.Bd2 Qd7 16.Qh5 b5 17.a4 b4 18.Ne2
 a5 $15 {Ljubojevic,L-Polugaevsky,L Roquebrune 1992})
10...d5 11.Qf3 {Back to the roots! During the last years the main discussion was concerned around
12.gxf6 d4 13.Bc4 (Judit played this line as well with both colours) but recent game Shirov-Anand
(Monaco 1999) was probably more than enough. The text move seemed to be rather forgotten during the
last years. Some tries to revive it (like Sokolov,A - Svidler/Russia ch 1998) had no success.}
 (11.gxf6 d4 12.Bc4 Qc7
  (12...Qxf6 13.Nd5 Qc6 14.Bxd4 Bb4+
   (14...Qxc4 $2 15.Nf6+ Ke7 16.Bxe5)
   (14...exd4 $2 15.Qxd4)
  15.c3 Qxc4 16.Be3 $40 {Shirov,A-Gelfand,B/Wijk aan Zee 1996})
 13.Qd3 dxe3 $1 14.fxe3 $6
  (14.0-0-0 exf2
   (14...Nc6 15.Nd5 Qa5 16.f4 Bh6 17.Kb1 b5 18.fxe5 e2 19.Qxe2 Bb7 20.Bb3 $18 {1-0
   Gallagher,J-Shneider,A/Bern op (09) ;EXP 46 1995 (26)})
  15.Bxf7+ $5
   (15.Nd5 Qc5 16.b4 Qd6 17.Bb3 Bd7 18.Qc4 Bc6 19.Qh4 Nd7 20.Qxf2 Nxf6 $17 {1-0
   Polgar,J-Svidler,P/Haifa act 1998 (34)})
  15...Kxf7 16.Qd5+ Ke8 17.f7+ Ke7 18.Qf3 Bh6+ 19.Kb1 Kf8 $13 {Shirov,A-Polgar,J/Dortmund 1996/})
 14...b5 15.Bb3
  (15.Bd5 Nc6 16.0-0-0 Bb7 17.Be6 Nb4 $17 {Hracek,Z-Kavalek,L/Ceska Trebova 1998/EXT 99/0-1 (59)})
 15...Bb7 16.Nd5 Qa5+ 17.c3 Nd7 $17 {0-1 Shirov,A-Anand,V/Monte Carlo MNC 1999 (24)})
11...d4 12.0-0-0 Nbd7 13.Bd2 {This seems to be the most reasonable attempt to continue the attack.
Some incredible sacrifices like 13.Bxd4 and 13.Rxd4 were practically tested as well but happened to
be too creative. The text move was played by another lady in the stem game Chiburdanidze-Cserna
(Pristina,1983).}
 (13.Bc4 $2 {was played in the latest game in this line} Qc7 14.Bb3
  ({Leko vs. Anand; Amber'08 (Rapid)} 14.Bxd4 exd4 15.Rhe1+ Kd8 16.Rxd4 Bc5 17.Rdd1 Re8 18.gxf6 Rxe1 19.Rxe1 Nxf6
  20.Rd1+ Bd7 21.Bxf7 Qxh2 22.Nd5 Rc8 23.Be6 Bxf2 24.c3 Rc7 25.Nxf6 Qh6+ 26.Kb1 Qxf6 27.Qxf2 Ke8 28.Qg3 1-0)
 14...dxc3 15.g6 fxg6 16.fxg6 hxg6 17.Qg2 Qc6 $19 {and Black was just two knights
 up/Sokolov,A-Svidler,P/Russia ch 1998})
13...dxc3 {Here and later Black has a lot of possibilities to defend. If I would try to analyse them
all extensively these comments will probably appear in the next millennium. So the lines I give here
are mostly illustrative. The only conclusion I could make while analysing these crazy variations is
that White has always some active play even when he (OK, she) remains two pieces down.}
 (13...Qc7 {Was recommended by IM Cserna} 14.gxf6 $5 {In my opinion, the only move to prove the
 correctness of White's idea.}
  (14.Bd3 Nc5 15.Bc4 dxc3 16.Bxc3 Nfe4 17.Rhe1 Nxc3 18.Qxc3 Bg7 19.f6 0-0 20.Rxe5 Be6 $17 {0-1
  Wedberg,T-Novikov,I/Copenhagen 1991/})
 14...dxc3
  (14...Qc6 15.Qxc6 bxc6 16.Ne4 $16)
 15.Bxc3 Qc6 {For some misterious reason this position is assessed in "Chess Informant" N36 as
 winning for Black. Only two moves were examined there: 16.Bg2 (allowing queens exchange) and 16. Qe2
 (16...Bh6!). However, White has one more move which leads to some messy positions where White's
 attacking chances are more than real.}
  (15...Nxf6 16.Re1 $13)
 16.Rd5 $1 {As I wrote already the following lines are not to prove something - they just show the
 variety of ways White can prepare decisive attack. Of course, Black is not resourceless at all, so
 please play through these lines, find mistakes, have fun - this position is everything but boring
 one.} Bh6+ $5
  (16...Nxf6 17.Rxe5+ Kd7
   (17...Kd8 18.Qxc6 bxc6 19.Re3 Be7 20.Bg2 $18)
  18.Qxc6+ bxc6 19.Re3 Bh6 20.Bxf6 $16)
  (16...Qxf6 17.Bc4 Rg8
   (17...Bh6+ 18.Kb1 Bg7 19.Re1 Qg5 20.Bd2 Qe7 21.Qg2 Kf8 22.f4 $44)
   (17...Bg7 18.Rg1 $44)
  18.Re1 Bd6 19.Qd1
   (19.Qh5 Be7 20.f4 Qh4)
   (19.Qd3 Bc7 20.f4 b5 21.Bb3 Qe7 22.fxe5
    (22.Bxe5 Nxe5 23.Rdxe5 Bxe5 24.Rxe5 Rg1+ 25.Kd2 Be6 26.fxe6 f6 27.Qe4 Rd8+ 28.Rd5 $13)
   22...Nc5 23.Qf3 Nxb3+ 24.axb3 $13)
  19...Bc7
   (19...Qg5+ 20.Kb1 Bc7 21.Rd3
    (21.Rxd7 Bxd7)
   21...Rg7
    (21...Qe7 22.f4 Nc5 23.Bxe5 $1
     (23.Rd5 Bxf5 24.Bxe5 Ne6)
    23...Nxd3 24.Bxd3 Kf8 25.Bg7+ Rxg7 26.Rxe7 Kxe7 27.Qe1+ Kd7 28.f6 Rg8 29.Qe7+ Kc6 30.Be4+ Kb6
    31.b4 $18)
   22.Rg3 Qf6 23.Rxg7 Qxg7 24.f4 $44)
  20.f4 Qc6
   (20...b5 21.fxe5 Qh6+ 22.Bd2 Qxh2 23.Rh1
    (23.e6 fxe6)
   23...Qg2
    (23...Qg3 24.e6 fxe6 25.Qh5+ Kd8 26.fxe6 bxc4 27.Rg5 $18)
   24.e6 bxc4 25.exd7+ Bxd7 26.Bb4 Bf4+ 27.Kb1 Ra7 28.Bc5 Rb7 29.Rg1 $16)
  21.Bb3 b5
   (21...Nf6 22.Bxe5 $18)
   (21...Rg2 22.Qh5 Nb6 23.Rd2 Rxd2 24.Qxf7+ Kd8 25.Bxd2 $18)
   (21...h6 22.Qh5 Qf6 23.h4 $18)
  22.Qh5 Rg7
   (22...Qf6 23.h4 Qg7 24.fxe5 Qg4 25.e6 $1 $18)
  23.fxe5 $18)
 17.Kb1 Bf4
  (17...Nxf6 18.Rxe5+ $18)
 18.Bg2 Nxf6
  (18...Rg8 19.Re1 Bxh2 20.Qh3 Rxg2 21.Qxg2 Nxf6 22.Qxh2 $18)
  (18...Nb6 19.Qxf4 $1 exf4
   (19...Qxd5 20.Qb4 Qd8 21.Re1 Bxf5 22.Bxb7 $18)
  20.Re5+ $18)
 19.Qxf4
  (19.Bxe5 Nxd5
   (19...Bxf5 20.Qxf4 $1
    (20.Bxf4 Nxd5 $13)
   20...Bxc2+ 21.Ka1 Nxd5 22.Qd4 Rg8 23.Bxd5 Qd7 24.Re1 $40)
  20.Bxh8 Bxf5 21.Qxd5 Qxd5 22.Bxd5 0-0-0 $19)
 19...exf4 20.Re5+
  (20.Re1+ Be6
   (20...Kf8 21.Rd8+ Kg7 22.Bxc6 Rxd8 23.Rg1+ Kh6 24.Bxf6 bxc6 25.Bg5+ Kh5 26.Bxd8 $16)
  21.Bxf6 Rg8
   (21...0-0 22.Rg1 $18)
  22.Bf3 Qb6 23.Rdd1 Rc8 $15)
 20...Kd7 21.Bxc6+ Kxc6 22.Ree1 Bxf5 23.Bxf6 Rhe8 $11)
 (13...Bb4 14.Nb1 Bxd2+
  (14...Be7 15.gxf6 Nxf6 16.Bc4 $1
   (16.Bg5 Qd5 $15)
  16...Qc7 17.Qb3 $36)
 15.Nxd2 Ng8 16.Ne4 $44)
14.Bxc3 Bg7
 (14...Qc7 15.gxf6 {- 13...Qc7}
  (15.Bd3 Bd6 16.Rhe1 {Chiburdanidze-Cserna/Pristina 1983} Ng8 $1 $17))
 (14...Ng8 15.f6
  (15.Qh5 Qc7 16.f4 Ne7)
 15...Ngxf6
  (15...Qc7 16.Bh3 Bd6 17.Rhe1 $44)
 16.Bxe5 Qb6
  (16...Qa5 17.Bxf6 Nxf6 18.Qxf6 Rg8 19.Bb5+ axb5 20.Rhe1+ $18)
 17.Bc3 Bg7 18.Bc4 $44)
15.Rg1 0-0
 (15...Ng8 16.Bc4 Qc7 17.Bd5
  (17.Bxf7+ Kxf7 18.Qh5+ Kf8)
  (17.f6 Ndxf6)
 17...h5
  (17...Nc5 18.Rge1 $1
   (18.f6 Nxf6 19.gxf6 Bh6+ 20.Kb1 Bf4 21.Bb4 Bf5 22.Bxc5 Qxc5 $13)
  18...Na4 19.f6 Bxf6 20.Bxe5 Bxe5 21.Rxe5+ Kf8 22.Rde1 $16)
 18.f6 Ngxf6 19.gxf6 Bxf6
  (19...Bh6+ 20.Kb1 Bf4 21.Bxf7+ $1 Kxf7 22.Rg7+ Ke6
   (22...Ke8 23.Bb4 Qb6 24.Re7+ Kd8 25.Qd5 $18)
  23.Qh3+ Kxf6 24.Rdg1 Rh6 25.Bb4 $18)
 20.Bxf7+
  (20.Bxe5 Qxe5
   (20...Bxe5 21.Qxf7+ Kd8 22.Rg8+ Rxg8 23.Qxg8+ Ke7)
  21.Rde1 Kd8 22.Rxe5 $36)
 20...Kxf7 21.Qd5+ Kf8 22.Bb4+ Be7 23.Bxe7+ Kxe7 24.Rg7+ Kd8 25.Qe6 Qc6 26.Rd6 Qb5 27.c4 Qa4 28.b3
 Qa3+ 29.Kb1 Qxd6 30.Qxd6 $16)
16.gxf6
 (16.Qe3 Kh8
  (16...Nh5 17.f6)
 17.Bxe5 Ne8 18.f6 Nexf6 19.gxf6 Bxf6 20.Bd6 Re8 21.Qb3 Qb6)
 (16.Kb1 Kh8
  (16...e4 17.Qh3)
 17.Bc4 Ng8)
 (16.Bb4 Ne8 17.f6
  (17.Bc4 Qc7)
 17...Nexf6 18.Bxf8 Kxf8)
16...Qxf6 17.Qe3
 (17.Qg3 Kh8 18.Kb1
  (18.f4 Bh6)
  (18.Bb4 Rg8)
 18...Nc5
  (18...Rg8 19.f4 Qxf5
   (19...exf4 20.Qxf4 Qb6 21.f6 $1 Qxg1 22.fxg7+ Rxg7 23.Qxf7 Qg6 24.Qe7 $18)
  20.fxe5 Nf8
   (20...Qg6 21.Qe3
    (21.Bc4 Qxg3 22.Rxg3 Bxe5 23.Rxd7 Bxc3 24.Rxg8+ Kxg8 25.Rd8+ Kg7 26.bxc3 $16))
  21.e6 Ng6 22.Bd3 $1 Qxe6 23.Bxg6 fxg6 24.Qc7 Qe8 25.Rd8 $1 Bf5 26.Rxe8 Raxe8 27.Rg2 $16)
 19.Re1
  (19.Bb4 Ne4
   (19...Bxf5 20.Bxc5 Rfc8 21.Rd6 Rxc5 22.Rxf6 Bxc2+ 23.Ka1 Bxf6 24.Qf3 Rc6 $13)
  20.Qg2 Bxf5 21.Bd3 Nd6 $17)
 19...Re8 20.f4 Qh6 21.Bh3 Na4 22.Bxe5 Bxe5 23.fxe5 Bd7)
 (17.Qg4 Kh8 18.f4 Qh6 19.Kb1
  (19.Rd6 Nf6 20.Qxg7+ Qxg7 21.Rxg7 Kxg7 22.Bxe5 Bxf5 23.Rxf6
   (23.Bxf6+ Kg8)
  23...Be4)
 19...Nf6)
17...Kh8
 (17...Re8 18.f4 $44)
 (17...Qxf5 18.Bh3 $18)
18.f4 Qb6
 (18...Qh6 19.Bc4 f6
  (19...exf4 20.Rxg7 $1
   (20.Bxg7+ Qxg7 21.Qe7 Qe5 22.Rxd7 Qxe7 23.Rxe7 Bxf5 $13)
  20...f6
   (20...fxe3 21.Rg6+ f6 22.Rxh6 $18)
  21.Rdg1 $1
   (21.Rg4 fxe3 22.Rdg1 e2+ 23.Kb1 e1=Q+ 24.Bxe1 Qg5 $19)
  21...Qxg7 22.Qe1 Qxg1 23.Qxg1 b5 24.Bd5 Rb8 25.Bb4 $18)
  (19...Bf6 20.Rd6 Rg8
   (20...b5 21.Rxf6 Qxf6 22.fxe5 Qh4 23.e6+ f6 24.exd7 Bxd7 25.Qe7 $18)
  21.Bxf7 Rxg1+ 22.Qxg1 Qg7 23.Qxg7+ Kxg7 24.Be6 $13)
  (19...Nf6 20.Rxg7 $1 Qxg7 21.Bxe5 Bxf5 22.Qd4
   (22.Qb6 Kg8 23.Bxf6 Qh6 24.Rg1+ Bg6 25.Be5 Rae8 $16)
  22...Kg8 23.Bxf6 Qh6 24.Rg1+ Bg6 25.Kb1 $18)
  (19...b5 20.Bd5 Rb8
   (20...b4 21.Bxb4 Rb8
    (21...exf4 22.Bxf8 Nxf8 23.Qb3 $18)
   22.Bxf8 Nxf8 23.Bxf7 $16)
  21.Rxg7 $1 Qxg7 22.Rg1 $18)
 20.Rg4
  (20.Rxg7 Qxg7 21.Rg1 Qh6)
 20...b5 21.Bd5 Rb8 22.Rdg1 Nb6 23.Bb3 Rb7 24.Qf2 Qh5 25.Qg2 Qh6 26.Be6)
 (18...b5 $2 19.Rxd7 Bxd7 20.Bxe5 $18)
 (18...Re8 19.Kb1
  (19.Rxg7 Qxg7 20.fxe5 Nxe5 21.f6 Qg6 22.Bxe5 Bf5 $17)
 19...Bh6 20.Rg4
  (20.Rd4 Qd8 $1 $17)
 20...Qxf5 21.Bh3 Nf6
  (21...Qe6 22.Rh4 f5 23.Bxf5 Qxf5 24.Rxh6 $44)
 22.Rg5 Qe4 23.Bxe5 Rxe5 24.Rxe5 Qxe3 25.Rd8+ Kg7 26.Rxe3 Bxf4 $13)
19.Qg3 Qh6 $2
 (19...Rg8 20.Bc4
  (20.Bd3 Qh6 21.Bc4 exf4 22.Qf3
   (22.Qe1 f3+ 23.Kb1 Bxc3 24.Qxc3+ Nf6 25.Rxg8+ Kxg8 26.Rd8+ Kg7 27.Qa3 Nd7 28.Qe7 Qf6 29.Qe8 b5
   $17)
  22...Bxc3 23.Qxc3+ Nf6 24.Rxg8+ Kxg8)
 20...Nf6 21.Bxe5
  (21.Bxf7 Ne4 22.Qg4 Nxc3 23.bxc3
   (23.Bxg8 Qe3+ 24.Rd2 Ne2+ 25.Qxe2 Qxg1+ 26.Rd1 Qb6 $19)
  23...Qe3+ 24.Kb1 Qb6+ $11)
 21...Bxf5 22.Bxf7 Rac8 23.Rd2 Nh5 24.Qe1 Bg6
  (24...Qa5 25.Bxg8 Rxg8 26.a3 Bg6 27.Rg5 $16)
  (24...Nxf4 25.Bxg8 Rxc2+ 26.Rxc2 Nd3+ 27.Kd1 Nxe5 28.Bb3 $1 $16
   (28.Bxh7 Qd4+ 29.Rd2 Bg4+ 30.Kc1 Bh6 $13)
  28...Bxc2+ 29.Kxc2 Qd4 30.Kb1)
 25.Bxg8 Kxg8 26.Bxg7 Nxg7 $13)
20.Rd6 $1 f6
 (20...Nf6 21.Bxe5 Bxf5 22.Qxg7+ Qxg7 23.Bxf6 Qxf6 24.Rxf6 Be6 25.f5 $16)
 (20...Bf6 21.Kb1 Qh4
  (21...exf4 22.Rxf6 Nxf6 23.Qxf4 $1 Rd8 24.Bd3 $18)
 22.Rxf6 $1 Qxg3
  (22...Qxf6 23.fxe5 Qh6 24.e6+ Nf6
   (24...f6 25.Bd2 $18)
  25.Qf4 $18)
 23.Rxg3 Nxf6 24.Bxe5 h5 25.Bxf6+ Kh7 26.Rg5 $18)
21.Bd2 e4 {Sad necessity.}
 (21...Nc5 {Most probably this is what Vishy was aiming for when playing 18...Qb6. However, this
 move, which seems to be winning due to double threat 22...Ne4 and 22...Bxf5, finds fantastic
 refutation.} 22.fxe5
  (22.Bg2 Bxf5 23.fxe5 Qg6 24.Qf2 Rac8 $17)
 22...Ne4 23.exf6 $3 Nxg3 24.fxg7+ Qxg7 25.Rxg3 {Black has a queen for a bishop but the mating
 threats force him to liquidate into the lost ending.} Qxg3
  (25...Qe5 26.Bc3 Qxc3 27.Rxc3 Bxf5 28.Bg2 $18)
 26.hxg3 h5
  (26...Rxf5 27.Bc4 h5 28.Rd8+ Kg7 29.Bc3+ Kg6 30.Bd3 $18)
 27.Bb4 Bxf5 28.Rh6+ Kg7 29.Bxf8+ Rxf8 30.Rxh5 $16)
22.Bc4 {Nobody's perfect! As Gary Kasparov said even DEEP BLUE is not. Judit's energetic play in
this game deserves highest praise but this is the moment where she could let her opponent with no
chance would she play straightforward 22.Qg4! with rather primitive intention Rg1-g3-h3. As
following variations show Black has no adequate defence.}
 (22.Be3 Nb8 23.Qg4 Nc6 24.Rxc6 bxc6 25.Rg3 Qg6 $1)
 (22.Qg4 $1 b5
  (22...Nc5 23.Rg3 e3 24.Rxe3 Qxh2 25.Rh3 Qf2 26.Rxh7+ Kxh7 27.Qh5+ Kg8 28.Bc4+ Be6 29.Rxe6 $18)
  (22...Rg8 23.Bc4 Re8 24.Rg3 Nf8 25.Bc3 $1 Ng6 26.Rxf6 $18)
  (22...Ne5 23.fxe5 e3 24.Bc3 e2+ 25.Kb1 exf1Q+ 26.Rxf1 Qg5 27.Qxg5 fxg5 28.f6 Bh3
   (28...Kg8 29.e6 $18)
  29.fxg7+ Kxg7 30.e6+ Kg8 31.Rg1 $18)
  (22...Re8 23.Rg3 Nf8 24.Bc3 $1
   (24.Be2 Qg6 $1
    (24...Ng6 25.Rh3 Nh4 26.Rd5 $1 $18)
   25.fxg6 Bxg4 26.Bxg4 hxg6 27.f5 gxf5 28.Bxf5 Re5 29.Bh3 Rh5 $14)
  24...Ng6 25.Rxf6 Bxf6 26.Bxf6+ Kg8 27.Bc4+ Kf8 28.Rh3 Bxf5 29.Qxf5 Qxf4+ 30.Qxf4 Nxf4 31.Rxh7 Ne6
  32.Bc3 Rad8 33.Rxb7 Rc8
   (33...e3 34.Bb4+ Kg8 35.Be7 $18)
  34.Bb4+ Kg8 35.Bxa6 $18 {and White pawns will decide the game})
 23.Rg3 Rg8 24.Be3 $1 Rb8
  (24...Nb8 25.Qd1 $1 Bxf5
   (25...Bf8 26.Rxg8+ Kxg8 27.Qd5+ Kg7 28.Rd8 Qh4 29.Kd1 $18)
  26.Qd5 Qxh2 27.Rxg7 $1 Kxg7 28.Qxf5 Qh4
   (28...Rf8 29.Qxe4 Qg3 30.Kd2 $18)
  29.Bf2 Qh6 30.Qxe4 Kh8 31.Qxa8 Qxf4+ 32.Rd2 Rd8 33.Bd3 $18)
  (24...Qxh2 25.Rd1 $1 Qh6 26.Bg2 $18)
  (24...Nf8 25.Bg2 Rb8 26.Bxe4 b4 27.Qf3 $1 $18)
 25.Bg2 $1
  (25.Rc6 Ra8
   (25...Nf8 26.Qe2 $1 Bxf5 27.Rc5 $16)
   (25...a5 $5)
  26.Rc7 Rb8 27.Bg2 Rb7 28.Rxc8 Rxc8 $13)
  (25.Rd2 Nf8
   (25...Nb6 26.Bxb6 Rxb6 27.Rdg2 Rc6 28.b4 $1 $16
    (28.Rh3 Bxf5 29.Qxf5 Rc5))
  26.Rdg2
   (26.Qe2 Bxf5 27.Rd5 Be6)
   (26.Bg2)
  26...Ng6
   (26...Rb7 27.Rh3 Qg6 28.fxg6 Bxg4 29.Rxg4 f5 30.Rgh4 h6 31.Rh5 $18)
  27.Rh3 Bxf5 28.Qxf5 Nh4 $13)
 25...Rb7 26.Bxe4 Rc7 27.Rd4 $1 $18)
22...b5
 (22...Nb8 23.Qg4 b5 24.Bd5 Ra7 25.Rg3
  (25.Bxe4)
 25...Qxh2 26.c3
  (26.Rh3 Bxf5)
 26...Bxf5)
 (22...Nc5 23.Qe3
  (23.Qg4 e3
   (23...b5 24.Bd5 Ra7 25.Bb4
    (25.Be3 Rc7 26.Rc6 Rxc6 27.Bxc6 Nb7)
   25...Na4 26.Rg3 Qxh2 27.Rh3 Bxf5 28.Qxf5 Qg1+ 29.Kd2 Qf2+ 30.Kd1 Bh6 $17)
  24.Bb4 Ne4 25.Rd4 Re8
   (25...Nf2 26.Bxf8 $1 Nxg4 27.Bxg7+ Kxg7 28.Rxg4+ Kf8 29.Re4 Be6 30.Rxe6 Qxh2 31.Rxe3))
 23...Na4 24.Qxe4 Rb8 25.Bd5 Nc5
  (25...b5 26.Be3 $18)
 26.Qe7)
23.Be6 Ra7 $2 {Black misses the last chance to move his unfortunate extra knight from d7. It was
absolutely necessary because after the text move he'll be limited to some chaotic rooks and pawns
moves till the end of the game.}
 (23...Nc5 $1 24.Bd5
  (24.Rc6 Nxe6 25.fxe6 Qg6
   (25...Rg8 26.f5 Qh5
    (26...Bb7 27.Rc7 Bd5 28.Kb1 $1 Qxd2 29.Rxg7 $18)
    (26...Qxd2+ 27.Kxd2 Bh6+ 28.Ke2 Rxg3 29.Rxg3 Bb7
     (29...Bf4 30.e7 $18)
    30.Rc7 Bd5 31.Rh3 Bg7 32.b3 $18)
   27.Rc7 Bxe6 28.Rxg7 Bf7 29.Bc3 Qxf5 $13)
  26.Qf2 Qf5 27.Rc7 Rg8 28.Qg3 Bxe6 29.Rxg7 Qh3 $11)
  (24.Be3 Nb7 25.Rc6 Bxe6 26.fxe6 Rg8)
 24...Ra7
  (24...Rb8 25.Rc6 Bxf5
   (25...Nd7 26.Rc7 $18)
  26.Rxc5 Rbc8 27.Rxc8 Rxc8 28.Be3 $16)
  (24...Bxf5 25.Bxa8 Rxa8 26.Rd5 Ne6 27.Rxf5 Nd4 28.Qe3 Nxf5 29.Qxe4 Rd8 30.Qxf5 Qxh2 31.Be3 $16)
 25.Bb4
  (25.Rc6 Na4 26.Be3
   (26.Qe3 Rd7 27.Be6
    (27.Bb4 Re8 28.Be6)
   27...Rdd8 28.b3
    (28.Rc7 Bxe6 29.fxe6 Rg8)
   28...Bxe6 29.fxe6 Rc8 30.Rxc8 Rxc8 31.Qa7 Nc5 32.e7 f5)
   (26.Be6 Bxe6 27.fxe6 Rg8 28.b3 Qh5)
  26...Re7)
 25...Rc7
  (25...Na4 26.Rxa6 Bxa6 27.Bxf8 $16)
 26.Rc6 Rxc6 27.Bxc6 Bxf5 28.Bxc5 Rc8)
 (23...Nb8 {is hardly improving knight's position.} 24.Be3 a5
  (24...Bxe6 25.fxe6 Qg6 26.Qh3 Qe8 27.f5 Rg8 28.Rd4 Bf8 29.Rxg8+ Kxg8 30.Rxe4 Nc6 31.Rg4+ Kh8
  32.Qg2 Bd6 33.Bh6 $18)
  (24...Bb7 25.Rd2 $1 $18 Re8 26.Rdg2)
 25.Rgd1 $1 Bxe6 26.fxe6 Qg6 27.Qh3 $16)
24.Rc6 {In some unconventional way this game is a miniature. This position is already totally lost
for Black. With the following nice manoeuvre White conquers 7-th rank for his rook and that's over.}
a5 25.Be3 Rb7 26.Bd5 Rb8 27.Rc7 $18 {This position is really picturesque - despite his extra piece
Black can hardly move. White has plenty of winning plans - Bc6 & Ba7 or Qg4 & Rg1-g3-h3, for
instance. The Tiger is caught.}
 (27.Re6 {with the idea} Bb7 28.Re7 $1 Bxd5 29.Qxg7+ Qxg7 30.Rgxg7 Bg8 31.Rxd7 {looks like one more
 way to Rome but Judit's move is more stylish - the domination is complete.})
27...b4 28.b3 {So smart! This waiting move shows perfectly how helpless Black is. After 28... a4
29.bxa4!? with the following a-pawn march is worth considering.}
 (28.Qg4 $5 $18)
28...Rb5 {Resignation. Black gives his extra piece back but new massive losses are still to come.}
29.Bc6 Rxf5 30.Rxc8 $1 {The easiest way to win.} Rxc8 31.Bxd7 Rcc5 32.Bxf5 Rxf5 33.Rd1 Kg8 34.Qg2
Kf8 {Vishy didn't feel like getting mated in some moves after 35.Qxe4, so he resigned. Great victory
by Judit.}
1-0

[Event "Russia vs The Rest of the World"]
[Site "Moscow RUS"]
[Date "2002.09.09"]
[EventDate "2002.09.08"]
[Round "5"]
[Result "1-0"]
[White "Judit Polgar"]
[Black "Kasparov"]
[ECO "C67"]
[WhiteElo "2681"]
[BlackElo "2838"]
[PlyCount "84"]

1. e4 e5 2. Nf3 Nc6 3. Bb5 Nf6 4. O-O Nxe4 5. d4 Nd6 6. Bxc6 dxc6 7. dxe5
Nf5 8. Qxd8+ Kxd8 9. Nc3 h6 10. Rd1+ Ke8 11. h3 Be7 12. Ne2 Nh4 13. Nxh4
Bxh4 14. Be3 Bf5 15. Nd4 Bh7 16. g4 Be7 17. Kg2 h5 18. Nf5 Bf8 19. Kf3 Bg6
20. Rd2 hxg4+ 21. hxg4 Rh3+ 22. Kg2 Rh7 23. Kg3 f6 24. Bf4 Bxf5 25. gxf5
fxe5 26. Re1 Bd6 27. Bxe5 Kd7 28. c4 c5 29. Bxd6 cxd6 30. Re6 Rah8 31.
Rexd6+ Kc8 32. R2d5 Rh3+ 33. Kg2 Rh2+ 34. Kf3 R2h3+ 35. Ke4 b6 36. Rc6+ Kb8
37. Rd7 Rh2 38. Ke3 Rf8 39. Rcc7 Rxf5 40. Rb7+ Kc8 41. Rdc7+ Kd8 42. Rxg7
Kc8 1-0

[Event "Superstars Hotel Bali"]
[Site "Benidorm ESP"]
[Date "2002.11.29"]
[EventDate "2002.11.29"]
[Round "4"]
[Result "0-1"]
[White "Ponomariov"]
[Black "Judit Polgar"]
[ECO "B90"]
[WhiteElo "2743"]
[BlackElo "2685"]
[PlyCount "76"]

1. e4 c5 2. Nf3 d6 3. d4 cxd4 4. Nxd4 Nf6 5. Nc3 a6 6. Be3 Ng4 7. Bg5 h6 8.
Bh4 g5 9. Bg3 Bg7 10. h3 Nf6 11. Qe2 Nc6 12. Nxc6 bxc6 13. e5 dxe5 14. Bxe5
O-O 15. h4 g4 16. g3 Qb6 17. O-O-O Be6 18. Bg2 Rfd8 19. Rhe1 h5 20. b3 Rac8
21. Na4 Rxd1+ 22. Rxd1 Qb5 23. Bf1 Bc4 24. Qxc4 Qxe5 25. c3 Qf5 26. Qc5 Qf3
27. Bd3 Bh6+ 28. Kc2 Ne4 29. Qe5 Nxf2 30. Be2 Qg2 31. Re1 Rd8 32. Qxe7 Rd2+
33. Kb1 Qd5 34. Ka1 Ne4 35. Qe8+ Kg7 36. Nb2 Rxb2 37. Kxb2 Qd2+ 38. Ka3 Nf6
0-1

[Event "Superstars Hotel Bali"]
[Site "Benidorm ESP"]
[Date "2002.12.01"]
[EventDate "2002.12.01"]
[Round "2"]
[Result "0-1"]
[White "Ponomariov"]
[Black "Judit Polgar"]
[ECO "A30"]
[WhiteElo "2743"]
[BlackElo "2685"]
[PlyCount "82"]

1. Nf3 Nf6 2. c4 e6 3. Nc3 c5 4. g3 b6 5. Bg2 Bb7 6. O-O Be7 7. Re1 d6 8.
e4 Nbd7 9. d4 cxd4 10. Nxd4 Rb8 11. b3 a6 12. Bb2 O-O 13. h3 Qc7 14. Qd2
Nc5 15. Rad1 Rfe8 16. f4 Ba8 17. Qf2 Ncd7 18. g4 h6 19. g5 hxg5 20. fxg5
Nh5 21. g6 Bf6 22. gxf7+ Kxf7 23. Bf3 Nf4 24. Bg4 g5 25. Nde2 Qc5 26. Nxf4
gxf4 27. Qxc5 bxc5 28. Rxd6 Bd4+ 29. Kf1 Ne5 30. Rxa6 Nxg4 31. hxg4 Rh8 32.
Ra7+ Kg6 33. Kg2 f3+ 34. Kg3 Be5+ 35. Kxf3 Rh3+ 36. Ke2 Rh2+ 37. Ke3 Rxb2 38. Na4??
 (38. Ne2 $15 Kg5 39. Rh1 Rf8 40. Rah7 Bf6 41. Rc7 e5 
 42. Ng1 Kxg4 43. Nf3 Bxe4 44. Kxe4 Re2+ 45. Kd3 Kxf3 
 46. Rh3+ Kg4 47. Kxe2 Kxh3 48. Rxc5)
38... Rxa2 39. Rh1 Bd4+
 (39.Rxb3+ 40.Nc3 Rxc3#)
40. Kf3 Rxb3+ 41. Kf4 e5+ 0-1

[Event "Monaco"]
[Site "Monaco"]
[Date "1993.??.??"]
[EventDate "?"]
[Round "5"]
[Result "1-0"]
[White "Polgar Judit"]
[Black "Karpov Anatoly"]
[ECO "B14"]
[WhiteElo "?"]
[BlackElo "?"]
[PlyCount "64"]

1. e4 c6 2. d4 d5 3. exd5 cxd5 4. c4 Nf6 5. Nc3 e6 6. Nf3 Bb4 7. cxd5
Nxd5 8. Bd2 Nc6 9. Bd3 Be7 10. O-O O-O 11. a3 Nxc3 12. Bxc3 Bf6 13. Ne5
Ne7 14. Qf3 Nd5 15. Be4 a5 16. Rac1 b6 17. Bd2 Bb7 18. Qg3 g6 19. Bh6
Bg7 20. Bxg7 Kxg7 21. Ng4 Qb8 22. Ne5 Nf6 23. Bb1 Qd6 24. Qf4 Qd5 25. f3
Rac8 26. Rcd1 Qb3 27. Qd2 Rc7 28. Rde1 Rfc8 29. Re3 Qd1 30. Rxd1 Rc1
31. Rxc1 Rxc1+ 32. Qxc1 1-0

[Event "It"]
[Site "Madrid (Spain)"]
[Date "1993.??.??"]
[EventDate "?"]
[Round "5"]
[Result "1-0"]
[White "Topalov Veselin"]
[Black "Polgar Judit (GM) (HUN)"]
[ECO "B81"]
[WhiteElo "?"]
[BlackElo "?"]
[PlyCount "72"]

1.e4 c5 2.Nf3 e6 3.d4 cxd4 4.Nxd4 Nf6
5.Nc3 d6 6.g4 h6 7.Be3 Nc6 8.f3 a6
9.Bc4 Na5 10.Bd3 b5 11.Qd2 Qc7 12.O-O-O Rb8
13.Kb1 g6 14.h4 Nd7 15.f4 Nc4 16.Bxc4 Qxc4
17.g5 hxg5 18.hxg5 Rxh1 19.Rxh1 Bb7 20.b3 Qc7
21.Rh8 e5 22.Ndxb5 axb5 23.Nxb5 Qc6 24.Nxd6+ Ke7
25.fxe5 Ke6 26.Nb5+ Qxb5 27.Rxf8 Qc6 28.Rxb8 Nxb8
29.Qd8 Na6 30.Qf6+ Kd7 31.Qxf7+ Kc8 32.Qf8+ Kc7
33.Qf7+ Kb8 34.e6 Qxe4 35.e7 Bc6 36.e8=Q+ 1-0
</pgn>
<!-- ChessViewer Section End -->
EOPGN;

/**
 * on top of the usual stuff these two small puzzles will test the automatic seqno assignments
 */

$pgn_sample2 = <<<EOPGN
<!-- ChessViewer Section Start -->
<pgn id="oChessViewer" style="margin: 20px;" onload='makeChessApplet ( null, { PuzzleMode: "on" } );'>
[Event "?"]
[Site "?"]
[Date "?"]
[Round "?"]
[White "by Karol Wojtyla"]
[Black "?"]
[Result "1-0"]
[SetUp "1"]
[FEN "8/K2B4/8/2kNR3/1N6/B7/8/8 w - -"]

{Karol Wojtyla used to make chess puzzles in his youth. White to play and mate in 2.} 1.Bb5 Kxb5
 (1...Kd6 2.Nd3#)
 (1...Kd4 2.Nc6#)
2.Nb6#
1-0
</pgn>
<!-- ChessViewer Section End -->
<hr>
<!-- ChessViewer Section Start -->
<pgn id="oChessViewer" onload='makeChessApplet ( null, { PuzzleMode: "on" } );'>
[Event "?"]
[Site "?"]
[Date "2008.12.01"]
[Round "?"]
[White "by Nick"]
[Black "?"]
[Result "1-0"]
[SetUp "1"]
[FEN "1K6/3B4/8/2kNR3/1N6/B7/8/8 w - -"]

{Mate in 2: Inspired by Karol Wojtyla's puzzle.}
1.Nb6+ Kxb6
 (1...Kd4 2.Bb2#)
 (1...Kd6 2.Nc6#
  (2.Nd3#))
2.Rb5#
1-0
</pgn>
<!-- ChessViewer Section End -->
EOPGN;

header ( 'Content-Type: text/html' );
header ( "Cache-Control: no-store, no-cache, must-revalidate" );
header ( "Pragma: no-cache" );

echo "<html><head>";
cvd_header_tags ( "" );
echo "</head><body><hr>" . cvd_content ( $pgn_sample1 ) . "<hr>" .
		cvd_content ( $pgn_sample2 ) . "<hr></body></html>";
?>
