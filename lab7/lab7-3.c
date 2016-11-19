#include<stdio.h>
#include<stdlib.h>

int times=0;
void move(int n,char A,char B,char C){
    if(n==1){
        printf("Move sheet form %c to %c\n",A,C);
        times++;
    }
    else{
        move(n-1,A,C,B);
        printf("Move sheet from %c to %c\n",A,C);
        times++;
        move(n-1,B,A,C);
    }
}




int main(void){
    int n;
    printf("Enter the number of disks:");
    scanf("%d",&n);
    move(n,'A','B','C');
    printf("%d",times);
    return 0;
}
