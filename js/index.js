const fn = async() => {
    await carregamento("link", [{ rel: "stylesheet" }, { href: "./css/index.css" }])
}

fn()