L.Routing.control({
    waypoints: [latLng1,latLng2]
}).addTo(mymap);
let routeUs = L.Routing.osrmv1();
routeUs.route([wp1,wp2],(err,routes)=>{
    if(!err)
    {
        let best = 100000000000000;
        let bestRoute = 0;
        for(i in routes)
        {
            if(routes[i].summary.totalDistance < best) {
                bestRoute = i;
                best = routes[i].summary.totalDistance;
            }
        }
        console.log('best route',routes[bestRoute]);
L.Routing.line(routes[bestRoute],{
styles : [
    {
        color : 'green',
        weight : '10'
    }
]
}).addTo(mymap);

}