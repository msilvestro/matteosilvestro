% Reconstructing More Science, based on a version by Taioo, arranged by Matteo Silvestro
% CC BY-SA http://creativecommons.org/licenses/by-sa/3.0/
\version "2.12.3"

manodx = \relative c {
	\clef bass
	\key aes \major
	\time 4/4
	\tempo 4 = 120
	% intro
	f8\mp c' g aes f c' g bes | f c' g aes bes aes g aes | f c' g aes f8 c' g bes | f des' c des bes c g aes |
	f8 c' g aes f c' g bes | f c' g aes bes aes g aes | f c' g aes f8 c' g bes | ees des c des bes c g aes |
	% main
	\clef treble
	f'4\mf c' aes bes | g aes f e | f c' aes bes | des g, bes e, |
	f4 c' aes bes | g aes f e | f c' aes bes | des g, bes e, |
	<<f'4 f,>> <<c' c'>> <<aes, aes'>> <<bes, bes'>> | <<g, g'>> <<aes, aes'>> <<f, f'>> <<e, e'>> | <<f, f'>> <<c c'>> <<aes, aes'>> <<bes, bes'>> | <<des, des'>> <<g,, g'>> <<bes, bes'>> <<e,, e'>> |
	<<f4 f,>> <<c' c'>> <<aes, aes'>> <<bes, bes'>> | <<g, g'>> <<aes, aes'>> <<f, f'>> <<e, e'>> |
	\clef bass
	f,,8\mp c' g aes f c' g bes | f c' g aes bes aes g aes | f c' g aes f8 c' g bes | f des' c des bes c g e |
	\time 6/4
 	f2\pp r1 |
	% intermezzo
	\clef treble
	r1 f'4\mp g | aes g f aes f4 g | aes g f aes f4 g | aes g f aes f4 g | aes g f aes f4 g |
	f4 aes c f, aes  c | e,4 aes b e, aes b | f4 bes d f, bes d | f,4 bes des f, bes des | g,4 bes c e,4 g bes | des,4 e g bes,4 des e | aes,4 c e
	\clef bass
	aes, e aes |
	% ripresa
	\time 4/4
	f8 c' g aes f c' g bes | f c' g aes bes aes g aes
	% main
	\clef treble
	f'4\mf c' aes bes | g aes f e | f c' aes bes | des g, bes e, |
	f4 c' aes bes | g aes f e | f c' aes bes | des g, bes e, |
	<<f'4 f,>> <<c' c'>> <<aes, aes'>> <<bes, bes'>> | <<g, g'>> <<aes, aes'>> <<f, f'>> <<e, e'>> | <<f, f'>> <<c c'>> <<aes, aes'>> <<bes, bes'>> | <<des, des'>> <<g,, g'>> <<bes, bes'>> <<e,, e'>> |
	<<f4 f,>> <<c' c'>> <<aes, aes'>> <<bes, bes'>> | <<g, g'>> <<aes, aes'>> <<f, f'>> <<e, e'>> | <<f, f'>> <<c c'>> <<aes, aes'>> <<bes, bes'>> | <<des, des'>> <<g,, g'>> <<bes, bes'>> <<e,, e'>> |
	% finale
	\clef bass
	f,,8\mp c' g aes f c' g bes | f c' g aes bes aes g aes |
	\override TextSpanner #'(bound-details left text) = "rit."
	f8\startTextSpan c' g aes f c' g bes | f c' g aes bes aes g aes | f c' g aes f8 c' g bes | f des' c des bes c g e\fermata | f1\stopTextSpan
}

manosx = \relative c, {
	\clef bass
	\key aes \major
	\time 4/4
	\tempo 4 = 120
	% intro
	f1~ | f | f~ | f |
	f1 | g2 aes | des,1 | ees2 e |
	% main
	<<f'8 f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> | <<c'' c,>> <<c' c,>> <<c' c,>> <<c' c,>> <<g' g,>> <<g' g,>> <<aes' aes,>> <<aes' aes,>> | <<des des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> | <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<e' e,>> <<e' e,>> <<e' e,>> <<e' e,>> |
	<<f'8 f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> | <<c'' c,>> <<c' c,>> <<c' c,>> <<c' c,>> <<g' g,>> <<g' g,>> <<aes' aes,>> <<aes' aes,>> | <<des des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> | <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<e' e,>> <<e' e,>> <<e' e,>> <<e' e,>> |
	<<f'8 f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> | <<c'' c,>> <<c' c,>> <<c' c,>> <<c' c,>> <<g' g,>> <<g' g,>> <<aes' aes,>> <<aes' aes,>> | <<des des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> | <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<e' e,>> <<e' e,>> <<e' e,>> <<e' e,>> |
	<<f'8 f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> | <<c'' c,>> <<c' c,>> <<c' c,>> <<c' c,>> <<g' g,>> <<g' g,>> <<aes' aes,>> <<aes' aes,>> |
	f1~ | f | f~ | f |
	\time 6/4
	<<f1~ f'~>> <<f2 f,>>
	% intermezzo
	<<f1~ f'~>> <<f2 f,>> | <<f1~ aes'~>> <<aes2 f,>> | <<f1~ f'~>> <<f2 f,>> | <<f1~ aes'~>> <<aes2 f,>> | <<f1~ f'~>> <<f2 f,>> |
	<<f1~ f'~>> <<f2 f,>> | <<e1~ e'~>> <<e2 e,>> | <<d'1~ d'~>> <<d2 d,>> | <<des1~ des'~>> <<des2 des,>> | <<c1~ c'~>> <<c2 c,>> | <<bes1~ bes'~>> <<bes2 bes,>> | <<aes1~ aes'~>> <<aes2 aes,>> |
	% ripresa
	\time 4/4
	f1~ | f |
	%main
	<<f'8 f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> | <<c'' c,>> <<c' c,>> <<c' c,>> <<c' c,>> <<g' g,>> <<g' g,>> <<aes' aes,>> <<aes' aes,>> | <<des des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> | <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<e' e,>> <<e' e,>> <<e' e,>> <<e' e,>> |
	<<f'8 f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> | <<c'' c,>> <<c' c,>> <<c' c,>> <<c' c,>> <<g' g,>> <<g' g,>> <<aes' aes,>> <<aes' aes,>> | <<des des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> | <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<e' e,>> <<e' e,>> <<e' e,>> <<e' e,>> |
	<<f'8 f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> | <<c'' c,>> <<c' c,>> <<c' c,>> <<c' c,>> <<g' g,>> <<g' g,>> <<aes' aes,>> <<aes' aes,>> | <<des des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> | <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<e' e,>> <<e' e,>> <<e' e,>> <<e' e,>> |
	<<f'8 f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> <<f' f,>> | <<c'' c,>> <<c' c,>> <<c' c,>> <<c' c,>> <<g' g,>> <<g' g,>> <<aes' aes,>> <<aes' aes,>> | <<des des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> | <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<e' e,>> <<e' e,>> <<e' e,>> <<e' e,>> |
	% finale
	<<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> <<des' des,>> | <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<ees' ees,>> <<e' e,>> <<e' e,>> <<e' e,>> <<e' e,>> |
	f1~ | f |  r | r | r |
}

\header {
	title = "Reconstructing More Science"
	composer = "Composed by Jonathan Coulton Penning"
	arranger = "Arranged by Matteo Silvestro - Based on a version by Taioo"
}
\paper {
  between-system-padding = #0.1
}
\score {
	\context PianoStaff <<
    \new Staff {
      \manodx
    }
    \new Staff {
      \manosx
    }
  >>
	\layout { }
	\midi { }
}
