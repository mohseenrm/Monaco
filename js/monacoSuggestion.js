var stopList = [
"a", "a's", "able", "about", "above", "abroad", "according", "accordingly", "across", "actually", "adj", "after", "afterwards", "again", "against", "ago", "ahead", "ain't", "aint", "all", "allow", "allows", "almost", "alone", "along", "alongside", "already", "also", "although", "always", "am", "amid", "amidst", "among", "amongst", "amoungst", "amount", "an", "and", "another", "any", "anybody", "anyhow", "anyone", "anything", "anyway", "anyways", "anywhere", "apart", "appear", "appreciate", "appropriate", "are", "aren't", "arent", "around", "as", "aside", "ask", "asking", "associated", "at", "available", "away", "awfully", "b", "back", "backward", "backwards", "be", "became", "because", "become", "becomes", "becoming", "been", "before", "beforehand", "begin", "behind", "being", "believe", "below", "beside", "besides", "best", "better", "between", "beyond", "bill", "both", "bottom", "brief", "but", "by", "c", "c'mon", "c's", "call", "came", "can", "can't", "cannot", "cant", "caption", "cause", "causes", "certain", "certainly", "changes", "clearly", "cmon", "co", "co.", "com", "come", "comes", "computer", "con", "concerning", "consequently", "consider", "considering", "contain", "containing", "contains", "corresponding", "could", "couldn't", "couldnt", "course", "cry", "currently", "d", "dare", "daren't", "darent", "de", "definitely", "describe", "described", "despite", "detail", "did", "didn't", "didnt", "different", "directly", "do", "does", "doesn't", "doesnt", "doing", "don't", "done", "dont", "down", "downwards", "due", "during", "e", "each", "edu", "eg", "eight", "eighty", "either", "eleven", "else", "elsewhere", "empty", "end", "ending", "enough", "entirely", "especially", "et", "etc", "even", "ever", "evermore", "every", "everybody", "everyone", "everything", "everywhere", "ex", "exactly", "example", "except", "f", "fairly", "far", "farther", "few", "fewer", "fifteen", "fifth", "fify", "fill", "find", "fire", "first", "five", "followed", "following", "follows", "for", "forever", "former", "formerly", "forth", "forty", "forward", "found", "four", "from", "front", "full", "further", "furthermore", "g", "get", "gets", "getting", "give", "given", "gives", "go", "goes", "going", "gone", "got", "gotten", "greetings", "h", "had", "hadn't", "hadnt", "half", "happens", "hardly", "has", "hasn't", "hasnt", "have", "haven't", "havent", "having", "he", "he'd", "he'll", "he's", "hello", "help", "hence", "her", "here", "here's", "hereafter", "hereby", "herein", "heres", "hereupon", "hers", "herse", "herself", "hi", "him", "himse", "himself", "his", "hither", "hopefully", "how", "how's", "howbeit", "however", "hows", "hundred", "i", "i'd", "i'll", "i'm", "i've", "ie", "if", "ignored", "immediate", "in", "inasmuch", "inc", "inc.", "indeed", "indicate", "indicated", "indicates", "inner", "inside", "insofar", "instead", "interest", "into", "inward", "is", "isn't", "isnt", "it", "it'd", "it'll", "it's", "itd", "itll", "its", "itse", "itself", "j", "just", "k", "keep", "keeps", "kept", "know", "known", "knows", "l", "last", "lately", "later", "latter", "latterly", "least", "less", "lest", "let", "let's", "lets", "like", "liked", "likely", "likewise", "little", "look", "looking", "looks", "low", "lower", "ltd", "m", "made", "mainly", "make", "makes", "many", "may", "maybe", "mayn't", "maynt", "me", "mean", "meantime", "meanwhile", "merely", "might", "mightn't", "mightnt", "mill", "mine", "minus", "miss", "more", "moreover", "most", "mostly", "move", "mr", "mrs", "much", "must", "mustn't", "mustnt", "my", "myse", "myself", "n", "name", "namely", "nd", "near", "nearly", "necessary", "need", "needn't", "neednt", "needs", "neither", "never", "neverf", "neverless", "nevertheless", "new", "next", "nine", "ninety", "no", "no-one", "nobody", "non", "none", "nonetheless", "noone", "nor", "normally", "not", "nothing", "notwithstanding", "novel", "now", "nowhere", "o", "obviously", "of", "off", "often", "oh", "ok", "okay", "old", "on", "once", "one", "one's", "ones", "only", "onto", "opposite", "or", "other", "others", "otherwise", "ought", "oughtn't", "oughtnt", "our", "ours", "ourselves", "out", "outside", "over", "overall", "own", "p", "part", "particular", "particularly", "past", "per", "perhaps", "placed", "please", "plus", "possible", "presumably", "probably", "provided", "provides", "put", "q", "que", "quite", "qv", "r", "rather", "rd", "re", "really", "reasonably", "recent", "recently", "regarding", "regardless", "regards", "relatively", "respectively", "right", "round", "s", "said", "same", "saw", "say", "saying", "says", "second", "secondly", "see", "seeing", "seem", "seemed", "seeming", "seems", "seen", "self", "selves", "sensible", "sent", "serious", "seriously", "seven", "several", "shall", "shan't", "shant", "she", "she'd", "she'll", "she's", "shes", "should", "shouldn't", "shouldnt", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somebody", "someday", "somehow", "someone", "something", "sometime", "sometimes", "somewhat", "somewhere", "soon", "sorry", "specified", "specify", "specifying", "still", "sub", "such", "sup", "sure", "system", "t", "t's", "take", "taken", "taking", "tell", "ten", "tends", "th", "than", "thank", "thanks", "thanx", "that", "that'll", "that's", "that've", "thatll", "thats", "thatve", "the", "their", "theirs", "them", "themselves", "then", "thence", "there", "there'd", "there'll", "there're", "there's", "there've", "thereafter", "thereby", "thered", "therefore", "therein", "therell", "therere", "theres", "thereupon", "thereve", "these", "they", "they'd", "they'll", "they're", "they've", "theyd", "theyll", "theyre", "theyve", "thick", "thin", "thing", "things", "think", "third", "thirty", "this", "thorough", "thoroughly", "those", "though", "three", "through", "throughout", "thru", "thus", "till", "to", "together", "too", "took", "top", "toward", "towards", "tried", "tries", "truly", "try", "trying", "twelve", "twenty", "twice", "two", "u", "un", "under", "underneath", "undoing", "unfortunately", "unless", "unlike", "unlikely", "until", "unto", "up", "upon", "upwards", "us", "use", "used", "useful", "uses", "using", "usually", "v", "value", "various", "versus", "very", "via", "viz", "vs", "w", "want", "wants", "was", "wasn't", "wasnt", "way", "we", "we'd", "we'll", "we're", "we've", "welcome", "well", "went", "were", "weren't", "werent", "weve", "what", "what'll", "what's", "what've", "whatever", "whatll", "whats", "whatve", "when", "when's", "whence", "whenever", "whens", "where", "where's", "whereafter", "whereas", "whereby", "wherein", "wheres", "whereupon", "wherever", "whether", "which", "whichever", "while", "whilst", "whither", "who", "who'd", "who'll", "who's", "whod", "whoever", "whole", "wholl", "whom", "whomever", "whos", "whose", "why", "why's", "whys", "will", "willing", "wish", "with", "within", "without", "won't", "wonder", "wont", "would", "wouldn't", "wouldnt", "x", "y", "yes", "yet", "you", "you'd", "you'll", "you're", "you've", "youd", "youll", "your", "youre", "yours", "yourself", "yourselves", "youve", "z", "zero"
];
var filteredWords = [];
var monacoSuggestions = [];

function processJSON(data){
	$.each(data, function(index, value){
		$.each(value, function(key, value){
			//check if value exists
			if(key == "word"){
				if($.inArray(value, monacoSuggestions) > 0){}
					else{
					monacoSuggestions.push(value);
				}
			}
		});
	});
}
function callAjax(url){
	$.ajax(url, {
		success: function(data){
			processJSON(data);
		},
		error: function(data){
			console.log("failed to get data from url: " + url);
		}
	});
}
$(document).ready(function (){
	var monacoTitle, monacoTheme, url, firstSuggestion, secondSuggestion, thirdSuggestion;

	monacoTitle = $(".title");
	monacoTheme = $(".theme");

	firstSuggestion = $("#first");
	secondSuggestion = $("#second");
	thirdSuggestion = $("#third");

	var wordList = monacoTitle.text().split(" ");
	wordList = wordList.concat(monacoTheme.text().split(" "));

	$.each(wordList, function(index, value){
		if($.inArray(value.trim().toLowerCase(), stopList) > 0){}
		else{
			filteredWords.push(value);
		}
	});

	//iterate through all filtered words and populate suggestion list
	$.each(filteredWords, function(index, value){
		url = "https://api.datamuse.com/words?ml=";
		url += value;
		callAjax(url);
	});

	var val = 0;
	var id = setInterval(function(){
		firstSuggestion.text(monacoSuggestions[Math.floor((Math.random() * monacoSuggestions.length) + 1)]);
		secondSuggestion.text(monacoSuggestions[Math.floor((Math.random() * monacoSuggestions.length) + 1)]);
		thirdSuggestion.text(monacoSuggestions[Math.floor((Math.random() * monacoSuggestions.length) + 1)]);

		firstSuggestion.fadeIn(800).delay(5000).fadeOut(800);
		secondSuggestion.delay(400).fadeIn(800).delay(5000).fadeOut(800);
		thirdSuggestion.delay(800).fadeIn(800).delay(5000).fadeOut(800);
	}, 7500);
});