function ClickPoster(title, year, rating, director, plot, signal) {
    if (signal == 1) {
        alert("Title : " + title + "\nYear : " + year + "\nDirector : " + director +
            "\nRating : " + rating + "\nPlot : " + plot);
    }
    else {
        alert("님 못잡음 ㅅㄱ");
    }
}
