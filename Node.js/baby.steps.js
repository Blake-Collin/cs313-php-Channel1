//console.log(process.argv);

sum = 0;
process.argv.forEach(num => {
    if(parseInt(num) > 0)
    {
        sum += parseInt(num);
    }
});

console.log(sum);