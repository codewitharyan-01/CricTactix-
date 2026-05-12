const axios = require('axios');
const cheerio = require('cheerio');

async function getLiveScore(url) {
    try {
        const { data } = await axios.get(url, {
            headers: {
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
            }
        });
        const $ = cheerio.load(data);
        
        // Extracting score from meta tags or specific elements
        const title = $('title').text();
        const score = title.split('|')[0].trim();
        
        console.log({
            source: "ESPNCricinfo Scraper",
            rawTitle: title,
            extractedScore: score
        });
    } catch (error) {
        console.error("Scraping failed with headers too:", error.message);
    }
}

const url = 'https://www.espncricinfo.com/series/indian-premier-league-2026-9241/gujarat-titans-vs-sunrisers-hyderabad-56th-match-152119/live-cricket-score';
getLiveScore(url);
