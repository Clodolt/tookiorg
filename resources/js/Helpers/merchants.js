import * as signalR from "@microsoft/signalr";

const connection = new signalR.HubConnectionBuilder()
    .configureLogging(signalR.LogLevel.Debug)
    .withUrl("https://lostmerchants.com/MerchantHub", {
        skipNegotiation: true,
        transport: signalR.HttpTransportType.WebSockets
    })
    .build();

export async function start() {
    try {
        await connection.start();
        console.log("SignalR Connected.");
    } catch (err) {
        console.log(err);
        setTimeout(start, 5000);
    }
};


connection.onclose(async () => {
    await start();
});

export async function getMerchants(server) {
    try {
        let merchants = await connection.invoke("GetKnownActiveMerchantGroups", server);
        return merchants;
    } catch (err) {
        console.log(err);
    }
};


export const regions =
    [
        {
            name: 'EU Central',
            servers:
                [
                    'Neria',
                    'Kadan',
                    'Trixion',
                    'Calvasus',
                    'Thirain',
                    'Zinnervale',
                    'Asta',
                    'Wei',
                    'Slen',
                    'Procyon',
                    'Sceptrum',
                    'Beatrice',
                    'Inanna',
                    'Thaemine',
                    'Sirius',
                    'Antares',
                    'Brelshaza',
                    'Nineveh',
                    'Mokoko',
                ]
        },
        {
            name: 'EU West',
            servers: [
                'Rethramis',
                'Tortoyk',
                'Moonkeep',
                'Stonehearth',
                'Shadespire',
                'Tragon',
                'Petrania',
                'Punika',
            ]
        },
        {
            name: 'NA East',
            servers: [
                'Azena',
                'Una',
                'Regulus',
                'Avesta',
                'Galatur',
                'Karta',
                'Ladon',
                'Kharmine',
                'Elzowin',
                'Sasha',
                'Adrinne',
                'Aldebaran',
                'Zosma',
                'Vykas',
                'Danube',
            ]
        },
        {
            name: 'NA West',
            servers: [
                'Mari',
                'Valtan',
                'Enviska',
                'Akkan',
                'Bergstrom',
                'Shandi',
                'Rohendel',
            ]
        },
        {
            name: 'South America',
            servers: [
                'Kazeros',
                'Agaton',
                'Gienah',
                'Arcturus',
                'Yorn',
                'Feiton',
                'Vern',
                'Kurzan',
                'Prideholme',
            ]
        }


    ]

