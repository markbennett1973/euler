#include <stdio.h>
#include <math.h>

int main(void) {
	int const TARGET = 1000;
	
	for(int a = 1; a < TARGET; a++) {
		for(int b = a + 1; b <= TARGET; b++) {
			float c = sqrt((a * a) + (b * b));
			if (a + b + c == TARGET) {
				printf("Product = %d\n", a * b * (int)c);
				return 0;
			}
		}
	}
}