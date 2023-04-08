package main

import "prayersNetwork/routers"

func main() {

	router := routers.RegisterRouters()

	router.Run(":8085")
}
