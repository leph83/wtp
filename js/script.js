const options = {
    containers: ["#content"],
    cache: false
};

// new SwupScrollPlugin({
//     doScrollingRightAway: false,
//     animateScroll: false,
//     scrollFriction: 0,
//     scrollAcceleration: 0,
// });

// const swup = new Swup(
//     options,
//     {
//         plugins: [new SwupScrollPlugin()]
//     }
// );


const swup = new Swup(
    options,
    { 
        plugins: [new SwupScrollPlugin({ 
            doScrollingRightAway: false, 
            animateScroll: false, 
            scrollFriction: 0, 
            scrollAcceleration: 0, 
        })] 
    }
);