NUM_EQUALS EQU 00b
NUM1_GREAT EQU 01b
NUM2_GREAT EQU 10b

NUM1 EQU 512d
NUM2 EQU 3421d

	ORG 0000h
	; inicjowanie rejestrów liczbami które będą porównywane
	MOV R1, #H(NUM1) ; wsadzamy część wysoką jakieś liczby schowanej pod nazwją NUM1 
	MOV R2, #L(NUM1) ; -II- niską -II- 
	MOV R3, #H(NUM2)
	MOV R4, #L(NUM2)

	LJMP CMP ; wywołaj program porównujący CMP
	; w rejestrze R5 znajdzie się wynik


; podprogram porównujący dwie liczby dwubajtowe: Liczba1 (R1 R2) z Liczba2 (R3 R4) 
CMP: 
	MOV A, R1 ; wsadź część wysoką pierwszej liczby do akumulatora
	CJNE A, R3, HIGH_NEQ ; porównaj R1 (w akumulatorze) z R3 i gdy nie są równe skocz pod HIGH_NEQ
     	
	; gdy są równe wystarczy porównać niższe części liczb
	MOV A, R2; ; przenosi do akumulatora częśc niską liczby pierwszej
	CJNE A, R4, NUMS_EQUALS ; gdy część niska też jest sobie równa to liczby równe!
	CLR C ; wyczyszczenie znacznika carry, który w odejmowaniu oznacza wykonanie pożyczki
	SUBB A, R4 ; odejmij części wysokiej liczby pierwszej część wysoką liczby drugiej
	JC NUM2_GREATER ; gdy R4 większe to wykonano pożyczkę (czyli ustawiono bit przeniesienia)
        JMP NUM1_GREATER ;	

;porównywanie cześci wysokich bo nie są równe
HIGH_NEQ: 
	CLR C ; wyczyszczenie znacznika carry, który w odejmowaniu oznacza wykonanie pożyczki
	SUBB A, R3 ; odejmij części wysokiej liczby pierwszej część wysoką liczby drugiej
	JC NUM2_GREATER ; R3 większe bo wykonano pożyczkę (ustawiono bit przeniesienia)
        JMP NUM1_GREATER ;

NUM1_GREATER:
	MOV R5, #NUM1_GREAT 
NUM2_GREATER:
	MOV R5, #NUM2_GREAT 
NUMS_EQUALS:
 	MOV R5, #NUM_EQUALS 

Sakwa rowerowa New Looxs Joli Hanna Double czarna
