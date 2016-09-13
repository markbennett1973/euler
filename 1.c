#include<stdio.h>

// gcc -o 1 1.c

int main(void)
{
	int sum = 0;
	int x = 1;
	while(x < 1000) {
		if (x % 3 == 0 || x % 5 == 0) {
			sum += x;
		}
		x++;
    }
	printf("Sum = %d\n", sum);
}