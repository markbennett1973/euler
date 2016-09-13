#include <stdio.h>
#include <string.h>
#include <stdlib.h>

char *reverse(char source[])
{
    int length = strlen(source) ;    
    char *out = malloc(length);

    for (int i = 0; i < length; i++)
    {
        out[i] = source[length-i-1];
    }
    
    return out;
}

int isPalindrome(number)
{
	char str[15];
	sprintf(str, "%d", number);
	if (strcmp(str, reverse(str)) == 0) {
		return 1;
	}
	else {
		return 0;
	}
}


int main(void)
{
	int largest = 0;
	
	for(int i = 100; i < 1000; i++) {
		for(int j = 100; j < 1000; j++) {
			int product = i * j;
			if (isPalindrome(product) == 1 && product > largest) {
				largest = product;
			}
		}
	}
	
	printf("The largest palindrome product is %d\n", largest);
}