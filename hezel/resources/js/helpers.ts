export const formatCurrency = (amount) => {
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'KES',
        maximumSignificantDigits: 3
    });

    const abbreviations = {
        M: 1000000,
        B: 1000000000,
        T: 1000000000000
    };

    for (const abbreviation in abbreviations) {
        if (Math.abs(amount) >= abbreviations[abbreviation]) {
            return formatter.format(amount / abbreviations[abbreviation]) + abbreviation;
        }
    }

    return formatter.format(amount);
}
