#include<stdio.h>

int main(void) {
	const int LIMIT = 4000000;

	int current = 1, prev = 0, sum = 0, new = 0;
	
	while(new < LIMIT) {
		new = current + prev;
		prev = current;
	
		if (new < LIMIT) {
			current = new;
			if (current % 2 == 0) {
				sum += current;
			}
		}
	}
	
	printf("Sum = %d\n", sum);	
}