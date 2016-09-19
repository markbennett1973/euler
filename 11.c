#include<stdio.h>

int checkLocation(int row, int column, char* digits);
int getNumberAtLocation(int row, int column, char* digits);

int main(void){
	
	char digits[800]=
		"0802229738150040007504050778521250779108"
		"4949994017811857608717409843694804566200"
		"8149317355791429937140675388300349133665"
		"5270952304601142692468560132567137023691"
		"2231167151676389419236542240402866331380"
		"2447326099034502447533537836842035171250"
		"3298812864236710263840675954706618386470"
		"6726206802621220956394396308409166499421"
		"2455580566739926971778789683148834896372"
		"2136230975007644204535140061339734313395"
		"7817532822753167159403800462161409535692"
		"1639054296353147555888240017542436298557"
		"8656004835718907054444374460215851541758"
		"1980816805944769287392138652177704895540"
		"0452088397359916079757321626267933279866"
		"8836688757622072034633674655123263935369"
		"0442167338253911249472180846293240627636"
		"2069364172302388346299698267598574043616"
		"2073352978319001743149714886811623570554"
		"0170547183515469169233486143520189196748";
	
	int max = 0;
	int maxAtLocation = 0;
	
	for (int row = 0; row < 20; row++) {
		for (int column = 0; column < 20; column++) {
			maxAtLocation = checkLocation(row, column, digits);
			if (maxAtLocation > max) {
				max = maxAtLocation;
			}
		}
	}
	
	printf("Found max product %d\n", max);
}

int checkLocation(int row, int column, char* digits) {
	int maxProduct = 0, product, i;

	// Start with left-to-right
	if (column < 17) {
		product = 1;
		for (i = 0; i < 4; i++) {
			product = product * getNumberAtLocation(row, column + i, digits);
		}
		
		if (product > maxProduct) {
			maxProduct = product;
		}
	}
	
	// Then up-down
	if (row < 17) {
		product = 1;
		for (i = 0; i < 4; i++) {
			product = product * getNumberAtLocation(row + i, column, digits);
		}
		
		if (product > maxProduct) {
			maxProduct = product;
		}
	}
	
	// Then diagonal down/left
	if (column > 2 && row < 17) {
		product = 1;
		for (i = 0; i < 4; i++) {
			product = product * getNumberAtLocation(row + i, column - i, digits);
		}
		
		if (product > maxProduct) {
			maxProduct = product;
		}	
	}

	// Then diagonal down/right
	if (column < 17 && row < 17) {
		product = 1;
		for (i = 0; i < 4; i++) {
			product = product * getNumberAtLocation(row + i, column + i, digits);
		}
		
		if (product > maxProduct) {
			maxProduct = product;
		}	
	}

	return maxProduct;
}

int getNumberAtLocation(int row, int column, char* digits) {
	int index = (row * 2 * 20) + (column * 2);
	char digit1 = digits[index];
	char digit2 = digits[index + 1];
	
	return 10 * (digit1 - '0') + (digit2 - '0');
}