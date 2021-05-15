window.me = {
    // Menu
    'menu': `~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Wyatt's Blog CLI. v0.1.8
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Properties: (not all are shown 🕵️‍♂️)
- me
- me.[name, n]
- me.[twitter,t]
- me.[github,gh]
- me.[stack]

Methods: (not all are shown 🔮)
- me.inspire()
- me.poke()
- me.help()
    `,

    // Name
    'n': 'Wyatt Castaneda',
    'name': 'Wyatt Castaneda',

    // Twitter
    'tw': 'https://twitter.com/WyattCastaned44',
    'twitter': 'https://twitter.com/WyattCastaned44',

    // GitHub
    'gh': 'https://github.com/WyattCast44',
    'github': 'https://github.com/WyattCast44',

    // Stack
    'stack': [
        'Tailwind CSS',
        'AlpineJS',
        'Laravel',
        'Livewire',
    ],

    inspire() {

        let quotes = [
            'Well begun is half done. - Aristotle',
            'He who is contented is rich. - Laozi',
            'Be present above all else. - Naval Ravikant',
            'Order your soul. Reduce your wants. - Augustine',
            'Smile, breathe, and go slowly. - Thich Nhat Hanh',
            'An unexamined life is not worth living. - Socrates',
            'Luck is when preparation meets opportunity - Seneca',
            'Simplicity is an acquired taste. - Katharine Gerould',
            'No surplus words or unnecessary actions. - Marcus Aurelius',
            'Simplicity is the essence of happiness. - Cedric Bledsoe',
            'When there is no desire, all things are at peace. - Laozi',
            'Very little is needed to make a happy life. - Marcus Antoninus',
            'Simplicity is the ultimate sophistication. - Leonardo da Vinci',
            'The whole future lies in uncertainty: live immediately. - Seneca',
            'The only way to do great work is to love what you do. - Steve Jobs',
            'Simplicity is the consequence of refined emotions. - Jean D\'Alembert',
            'Realize that everything connects to everything else - Leonardo da Vinci',
            'It is quality rather than quantity that matters. - Lucius Annaeus Seneca',
            'Waste no more time arguing what a good man should be, be one. - Marcus Aurelius',
            'Happiness is not something readymade. It comes from your own actions. - Dalai Lama',
            'It is not the man who has too little, but the man who craves more, that is poor. - Seneca',
            'People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius',
            'Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci',
            'I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger',
            'If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius',
            'Let all your things have their places; let each part of your business have its time. - Benjamin Franklin',
        ];

        console.log(quotes[Math.floor(Math.random() * quotes.length)])

        return
    },

    poke() {
        console.log("Ouch! 👈");
        return
    },

    help() {
        console.log(this.menu)
        return
    },
}

me.help()