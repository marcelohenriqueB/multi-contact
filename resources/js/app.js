import axios from 'axios';
import './bootstrap';

const paisInput = document.getElementById('input_country_code');



if (paisInput){
    const paisesList = document.getElementById('country');
    
    async function fetchCountries() {
        try {
            const response = await axios.get('https://restcountries.com/v3.1/all');
            const data = response.data;
            return data;
        } catch (error) {
            console.error('Erro ao buscar os países:', error);
            return [];
        }
    }
    
    async function populateCountries() {
        const countries = await fetchCountries();
    
        countries.forEach((country) => {
            const option = document.createElement('option');
            option.value = country.idd.root;

            if (country.idd.suffixes){
                option.value = country.idd.root +  country.idd.suffixes[0]
            }
          
            option.innerHTML = `${country.name.common}`;
            console.log(country)
            paisesList.appendChild(option);
        });
    }
    
    populateCountries();
} 


