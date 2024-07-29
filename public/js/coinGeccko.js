let fetchData =  () => { 
        // CG-WRSxBHyhN8bk4QNr7Lc88NDv
    const options = {method: 'GET', headers: {accept: 'application/json'}};
    
    fetch('https://api.coingecko.com/api/v3/onchain/simple/networks/network/token_price/addresses', options)
      .then(response => response.json())
      .then(response => console.log(response))
      .catch(err => console.error(err));
};


// fetchData()

let coingateFetch = () => {
    const options = {method: 'GET', headers: {accept: 'application/json'}};

fetch('https://api.coingate.com/api/v2/currencies', options)
  .then(response => response.json())
  .then(response => console.log(response))
  .catch(err => console.error(err));
};

coingateFetch();