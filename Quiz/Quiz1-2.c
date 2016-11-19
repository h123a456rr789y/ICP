#include<stdio.h>
#include<stdlib.h>

int main(void){
    int month, date, days;
    printf("Please enter the date and the number of the days:");
    scanf("%d/%d %d", &month, &date, &days);
    date+= days;
    while(date>28){
        switch(month++){
            case 1:
            case 3:
            case 5:
                if(date>31)
                    date=date-31;
                break;
            case 2:
                if(date>28)
                    date=date-28;
                break;
            case 4:
            case 6:
                if(date>30)
                    date=date-30;
                break;
            default:
                date=0;
                break;
        }
    }
    if(month>6)
        printf("His birthday is in next year.\n");
    else
        printf("His birthday is %d/%d",month,date);
    return 0;
}
