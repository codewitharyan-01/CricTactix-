const { cricketlive } = require('cricketlive');

// ESPNCricinfo URL for today's match (GT vs SRH)
const url = 'https://www.espncricinfo.com/series/indian-premier-league-2026-9241/gujarat-titans-vs-sunrisers-hyderabad-56th-match-152119/live-cricket-score';

cricketlive(url).then(details => {
    console.log(JSON.stringify(details, null, 2));
}).catch(error => {
    console.error("Scraping failed:", error);
});
